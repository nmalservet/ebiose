<?php
/**
 * DossierController.php
 *
 *
 * @author malservet nicolas <nicolas@malservet.eu>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2008-2013 BioSoftwareFactory
 * @license LGPL version 3
 * @package controllers
 * @since 1.0
 */
?>
<?php

class DossierController extends BSFController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/menuparametrage';

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
		$model=new Dossier;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$listDossier = Dossier::model()->findAll();
		$noeud = new Noeud(null);
		$noeud->listFils = $this->makeFils(null, $listDossier);
		
		if(isset($_POST['Dossier']))
		{
			$model->attributes=$_POST['Dossier'];
			if($model->save())
				$this->actionAdmin();
		}

		$this->render('create',array(
			'model'=>$model,
			'noeud'=>$noeud,
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
		$listDossier = Dossier::model()->findAll();
		$noeud = new Noeud(null);
		$noeud->listFils = $this->makeFils(null, $listDossier);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dossier']))
		{
			$model->attributes=$_POST['Dossier'];
			if($model->save())
				$this->actionAdmin();
		}

		$this->render('update',array(
			'model'=>$model,
			'noeud'=>$noeud,
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
		$dataProvider=new CActiveDataProvider('Dossier');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dossier('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dossier']))
			$model->attributes=$_GET['Dossier'];

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
		$model=Dossier::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='dossier-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	private function makeFils($id, $listDossier)
	{
		$resultat = array();
		foreach($listDossier as $dossier)
		{
			if($dossier->parent_id == $id)
			{
				
				$noeud = new Noeud($dossier);
				$noeud->listFils = $this->makeFils($noeud->id, $listDossier);
				$resultat[] = $noeud;
			}
		}
		return $resultat;
	}
	
	/**
	 * export csv des dossiers.
	 */
	public function actionExportCsv()
	{
		$model = new Dossier('search');
		$model->unsetAttributes();
		if(isset($_GET['Dossier']))
			$model->attributes=$_GET['Dossier'];
		$dataProvider = $model->search();
		$filename = 'liste_dossiers.csv';
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
		$dataProvider=new CActiveDataProvider('Dossier');
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		$mPDF1->Output('liste_dossiers.pdf', 'I');
	}
	
	public function actionExportXls(){
		$model = new Dossier('search');
		$model->unsetAttributes();
		if(isset($_GET['Dossier']))
			$model->attributes=$_GET['Dossier'];
		$dataProvider = $model->search()->getData();
		$data = array(1 => array ('nom','description'));
		foreach($dataProvider as $prel){
			$data[]=array($prel->nom, $prel->description);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des dossiers');
		$xls->addArray($data);
		$xls->generateXML('liste_dossiers');
	}
}
