<?php

class FonctionUtilisateurController extends BSFController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/menuadministration';

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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new FonctionUtilisateur;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FonctionUtilisateur']))
		{
			$model->attributes=$_POST['FonctionUtilisateur'];
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

		if(isset($_POST['FonctionUtilisateur']))
		{
			$model->attributes=$_POST['FonctionUtilisateur'];
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
		$dataProvider=new CActiveDataProvider('FonctionUtilisateur');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FonctionUtilisateur('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FonctionUtilisateur']))
			$model->attributes=$_GET['FonctionUtilisateur'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=FonctionUtilisateur::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='fonction-utilisateur-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * export csv des fonctions utilisateurss.
	 */
	public function actionExportCsv()
	{
		$model = new FonctionUtilisateur('search');
		$model->unsetAttributes();
		if(isset($_GET['FonctionUtilisateur']))
			$model->attributes=$_GET['FonctionUtilisateur'];
		$dataProvider = $model->search();
		$filename = 'liste_fonctionUtilisateurs.csv';
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
		$dataProvider=new CActiveDataProvider('FonctionUtilisateur');
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		$mPDF1->Output('liste_fonctionUtilisateurs.pdf', 'I');
	}
	
	public function actionExportXls(){
		$model = new FonctionUtilisateur('search');
		$model->unsetAttributes();
		if(isset($_GET['FonctionUtilisateur']))
			$model->attributes=$_GET['FonctionUtilisateur'];
		$dataProvider = $model->search()->getData();
		$data = array(1 => array ('Nom','Nom anglais','Description'));
		foreach($dataProvider as $prel){
			$data[]=array($prel->nom,$prel->nom_en, $prel->description);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des fonctionUtilisateurs');
		$xls->addArray($data);
		$xls->generateXML('liste_fonctionUtilisateurs');
	}
}
