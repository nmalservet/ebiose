<?php

class NonConformiteController extends BSFController
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
		$model=new NonConformite;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$listNiveauImportance=array();
		$modelNiveauImportance=NiveauImportanceNonConformite::model()->findAll();
		foreach($modelNiveauImportance as $niveau)
		{
			$listNiveauImportance[$niveau->id] = $niveau->nom;
		}
		
		if(isset($_POST['NonConformite']))
		{
			$model->date_creation=date(Constants::FORMAT_DATE);
			$model->attributes=$_POST['NonConformite'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'succes_create_non_conformite'));
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'listNiveauImportance'=>$listNiveauImportance,
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

		$listNiveauImportance=array();
		$modelNiveauImportance=NiveauImportanceNonConformite::model()->findAll();
		foreach($modelNiveauImportance as $niveau)
		{
			$listNiveauImportance[$niveau->id] = $niveau->nom;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['NonConformite']))
		{
			$model->attributes=$_POST['NonConformite'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'succes_update_non_conformite'));
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'listNiveauImportance'=>$listNiveauImportance,
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
		$dataProvider=new CActiveDataProvider('NonConformite');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new NonConformite('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NonConformite']))
			$model->attributes=$_GET['NonConformite'];

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
		$model=NonConformite::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='non-conformite-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/**
	 * export csv des nonConformites.
	 */
	public function actionExportCsv()
	{
		$model = new NonConformite('search');
		$model->unsetAttributes();
		if(isset($_GET['NonConformite']))
			$model->attributes=$_GET['NonConformite'];
		$dataProvider = $model->search();
		$filename = 'liste_nonConformites.csv';
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
		$dataProvider=new CActiveDataProvider('NonConformite');
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		$mPDF1->Output('liste_nonConformites.pdf', 'I');
	}
	
	public function actionExportXls(){
		$model = new NonConformite('search');
		$model->unsetAttributes();
		if(isset($_GET['NonConformite']))
			$model->attributes=$_GET['NonConformite'];
		$dataProvider = $model->search()->getData();
		$data = array(1 => array ('nom','description','priorite'));
		foreach($dataProvider as $prel){
			$data[]=array($prel->nom, $prel->description,$prel->niveau_importance_id);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des nonConformites');
		$xls->addArray($data);
		$xls->generateXML('liste_nonConformites');
	}
}
