<?php
/**
 * CatalogueController.php
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

class CatalogueController extends BSFController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/menuprojet';

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
		//liste avec tout les echantillon
		$listeEchantillon = Echantillon::model()->findAll();
		//liste sans ceux qui sont dans le catalogue
		$echantillons = array();
		foreach($listeEchantillon as $echantillon)
		{
			$dedans = false;
			foreach($echantillon->catalogues as $catalogue)
			{
				if($catalogue->id == $id)
				{
					$dedans=true;
				}
			}
			if(!$dedans)
			{
				$echantillons[] = $echantillon;
			}
		}
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$model,
			'listeEchantillon'=>$echantillons,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Catalogue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Catalogue']))
		{
			$model->attributes=$_POST['Catalogue'];
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

		if(isset($_POST['Catalogue']))
		{
			$model->attributes=$_POST['Catalogue'];
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
		$dataProvider=new CActiveDataProvider('Catalogue');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/**
	 * ajoute des echantillons dans le catalogue.
	 */
	public function actionAddEchantillon($id)
	{
		$model = $this->loadModel($id);
		if(isset($_POST['echantillon-autre-grid_c10']))
		{
			foreach($_POST['echantillon-autre-grid_c10'] as $id_echantillon)
			{
				$model->saveEchantillon($id_echantillon);
			}
		}
		$this->redirect(array('view','id'=>$id));
	}
	
	/**
	 * retire des echantillons du catalogue.
	 */
	public function actionRemoveEchantillon($id)
	{
		$model = $this->loadModel($id);
		if(isset($_POST['echantillon-catalogue-grid_c10']))
		{
			foreach($_POST['echantillon-catalogue-grid_c10'] as $id_echantillon)
			{
				$model->removeEchantillon($id_echantillon);
			}
		}
		$this->redirect(array('view','id'=>$id));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Catalogue('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Catalogue']))
			$model->attributes=$_GET['Catalogue'];

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
		$model=Catalogue::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='catalogue-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * export csv des echantillons.
	 */
	public function actionExportCsv()
	{
		$model = new Catalogue('search');
		$model->unsetAttributes();
		if(isset($_GET['Catalogue']))
			$model->attributes=$_GET['Catalogue'];
		$dataProvider = $model->search();
		$filename = 'liste_catalogues.csv';
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
		$dataProvider=new CActiveDataProvider('Catalogue');
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		$mPDF1->Output('liste_catalogues.pdf', 'I');
	}
	
	public function actionExportXls(){
		$model = new Catalogue('search');
		$model->unsetAttributes();
		if(isset($_GET['Catalogue']))
			$model->attributes=$_GET['Catalogue'];
		$dataProvider = $model->search()->getData();
		$data = array(1 => array ('Nom','Description'));
		foreach($dataProvider as $prel){
			$data[]=array($prel->nom, $prel->description);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des catalogues');
		$xls->addArray($data);
		$xls->generateXML('liste_catalogues');
	}
}
