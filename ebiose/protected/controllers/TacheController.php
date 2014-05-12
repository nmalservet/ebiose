<?php

class TacheController extends BSFController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/menucollaboration';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
					
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		//liste avec tout les users
		$listeUser = User::model()->findAll();
		//liste sans ceux qui sont affecté dans la tache
		$users = array();
		foreach($listeUser as $user)
		{
			$dedans = false;
			foreach($user->taches as $tache)
			{
				if($tache->id == $id)
				{
					$dedans=true;
				}
			}
			if(!$dedans)
			{
				$users[] = $user;
			}
		}
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'listeUser'=>$users,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tache;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tache']))
		{

			$model->nom=$_POST['Tache']["nom"];
			$model->description=$_POST['Tache']["description"];
			$model->date_limite=$_POST['Tache']["date_limite"]." ".$_POST['Tache']["heure_limite"].":00";
			$model->date_creation=date("Y-m-d H:i:s");
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tache']))
		{
			$model->attributes=$_POST['Tache'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tache');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tache('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tache']))
			$model->attributes=$_GET['Tache'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * ajoute des taches dans le catalogue.
	 */
	public function actionAddUser($id)
	{
		$model = $this->loadModel($id);
		if(isset($_POST['user-autre-grid_c1']))
		{
			foreach($_POST['user-autre-grid_c1'] as $id_tache)
			{
				$model->saveTache($id_tache);
			}
		}
		$this->redirect(array('view','id'=>$id));
	}
	
	/**
	 * retire des users de la tache.
	 */
	public function actionRemoveUser($id)
	{
		$model = $this->loadModel($id);
		if(isset($_POST['user-tache-grid_c1']))
		{
			foreach($_POST['user-tache-grid_c1'] as $id_tache)
			{
				$model->removeTache($id_tache);
			}
		}
		$this->redirect(array('view','id'=>$id));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Tache::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tache-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * export csv des taches.
	 */
	public function actionExportCsv()
	{
		$model = new Tache('search');
		$model->unsetAttributes();
		if(isset($_GET['Tache']))
			$model->attributes=$_GET['Tache'];
		$dataProvider = $model->search();
		$filename = 'liste_taches.csv';
		$csv = new ECSVExport($dataProvider);
		$csv->exportCurrentPageOnly();
		Yii::app()->getRequest()->sendFile($filename, $csv->toCSV(), "text/csv", false);
	}
	
	/**
	 * export pdf avec mpdf et liste  d'index : Technique HTML to PDF
	 */
	public function actionExportPdf()
	{
		$mPDF1 = Yii::app()->ePdf->mpdf();
		$dataProvider=new CActiveDataProvider('Tache');
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		$mPDF1->Output('liste_taches.pdf', 'I');
	}
	
	public function actionExportXls(){
		$model = new Tache('search');
		$model->unsetAttributes();
		if(isset($_GET['Tache']))
			$model->attributes=$_GET['Tache'];
		$dataProvider = $model->search()->getData();
		$data = array(1 => array ('nom','description','date_limite'));
		foreach($dataProvider as $prel){
			$data[]=array($prel->nom, $prel->description,$prel->date_limite);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des taches');
		$xls->addArray($data);
		$xls->generateXML('liste_taches');
	}
}
