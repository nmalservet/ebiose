<?php
/**
 * EchantillonController.php
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

class EchantillonController extends BSFController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/menubiobank';

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
	
	public function ajouterFils($echantillon, $dataProvider)
	{
		$listEchantillon=$echantillon->getFils();
		//echo $listEchantillon[0]."<br>";
		foreach($listEchantillon as $echantillonFils)
		{
			$dataProvider = $this->ajouterFils($echantillonFils, $dataProvider);
		}
		$dataProvider->setData(array_merge($dataProvider->getData(), array($echantillon)));
		return $dataProvider;
	}
	
	/**
	 * affecte l'attribut conteneur et l'attribut position
	 */
	public function actionPlacer($id,$position,$idConteneur)
	{
		$model=$this->loadModel($id);
		$model->conteneur_id=$idConteneur;
		$model->position=$position;
		if($model->save())
		{
			Yii::app()->user->setFlash('success', Yii::t('common', 'succes_put_echantillon'));
		}
		else
		{
			Yii::app()->user->setFlash('success', Yii::t('common', 'fail_put_echantillon'));
		}
		$this->redirect(array('view','id'=>$model->id));
		
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$dataProviderEchantillon=new CActiveDataProvider('Echantillon');
		$dataProviderEchantillon->setData(array());
		$listEchantillon=$model->getFils();
		$listConteneur = Conteneur::model()->findAll();
		$noeud = new NoeudConteneur(null);
		$noeud->listFils = Conteneur::makeFils(null, $listConteneur);
		foreach($listEchantillon as $echantillonFils)
		{
			$dataProviderEchantillon = $this->ajouterFils($echantillonFils, $dataProviderEchantillon);
		}
		$this->render('view',array(
			'model'=>$model,
			'dataProviderEchantillon'=>$dataProviderEchantillon,
			'noeud'=>$noeud,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Echantillon;

		//si l'on vient de la vue d'un prelevement
		if(isset($_GET['idPrelevement'])) $model->prelevement_id = $_GET['idPrelevement'];
		//si l'on vient de la vue d'un echantillon
		if(isset($_GET['idEchantillon'])) 
		{
			$parent=$this->loadModel($_GET['idEchantillon']);
			$model->parent_id = $parent->id;
			$model->prelevement_id = $parent->prelevement->id;
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Echantillon']))
		{
			$model->attributes=$_POST['Echantillon'];
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

		if(isset($_POST['Echantillon']))
		{
			$model->attributes=$_POST['Echantillon'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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
		$dataProvider=new CActiveDataProvider('Echantillon');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Echantillon('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Echantillon']))
			$model->attributes=$_GET['Echantillon'];

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
		$model=Echantillon::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='echantillon-form')
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
		$model = new Echantillon('search');
		$model->unsetAttributes();
		if(isset($_GET['Echantillon']))
			$model->attributes=$_GET['Echantillon'];
		$dataProvider = $model->search();
		$filename = 'liste_echantillons.csv';
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
		$dataProvider=new CActiveDataProvider('Echantillon');
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		$mPDF1->Output('liste_echantillons.pdf', 'I');
	}
	
	public function actionExportXls(){
		$model = new Echantillon('search');
		$model->unsetAttributes();
		if(isset($_GET['Echantillon']))
			$model->attributes=$_GET['Echantillon'];
		$dataProvider = $model->search()->getData();
		$data = array(1 => array ('Identifiant','Volume'));
		foreach($dataProvider as $prel){
			$data[]=array($prel->identifier, $prel->volume);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des echantillons');
		$xls->addArray($data);
		$xls->generateXML('liste_echantillons');
	}
}
