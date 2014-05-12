<?php

class PrelevementController extends BSFController
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('prelevement_id', $id);
		$dataProviderEchantillon=new CActiveDataProvider('Echantillon', array(
				'criteria' => $criteria,
		));
		$this->render('view',array(
				'model'=>$this->loadModel($id),
				'dataProviderEchantillon'=>$dataProviderEchantillon,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Prelevement;

		//si l'on vient de la vue d'un patient
		if(isset($_GET['idPatient'])) $model->patient_id = $_GET['idPatient'];
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Prelevement']))
		{
			$model->attributes=$_POST['Prelevement'];
			$model->date_creation=date(Constants::FORMAT_DATE);
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common','succes_create_prelevement'));
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$listSite=array();
		$listType=array();
		$listPatient=array();
		$modelSite=Site::model()->findAll();
		$modelType=TypePrelevement::model()->findAll();
		$modelPatient=Patient::model()->findAll();
		foreach ($modelSite as $row)
		{
			$listSite[$row["id"]] = $row["nom"];
		}
		foreach ($modelType as $row)
		{
			$listType[$row["id"]] = $row["nom"];
		}
		foreach ($modelPatient as $row)
		{
			$listPatient[$row["id"]] = $row["ipp"]." ".$row["nom_usuel"]." ".$row["date_naissance"];
		}
		
		$this->render('create',array(
				'model'=>$model,
				'listSite'=>$listSite,
				'listType'=>$listType,
				'listPatient'=>$listPatient,
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

		if(isset($_POST['Prelevement']))
		{
			$model->attributes=$_POST['Prelevement'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common','succes_update_prelevement'));
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$listSite=array();
		$listType=array();
		$listPatient=array();
		$modelSite=Site::model()->findAll();
		$modelType=TypePrelevement::model()->findAll();
		$modelPatient=Patient::model()->findAll();
		foreach ($modelSite as $row)
		{
			$listSite[$row["id"]] = $row["nom"];
		}
		foreach ($modelType as $row)
		{
			$listType[$row["id"]] = $row["nom"];
		}
		foreach ($modelPatient as $row)
		{
			$listPatient[$row["id"]] = $row["ipp"]." ".$row["nom_usuel"]." ".$row["date_naissance"];
		}
		
		$this->render('update',array(
				'model'=>$model,
				'listSite'=>$listSite,
				'listType'=>$listType,
				'listPatient'=>$listPatient,
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
		$dataProvider=new CActiveDataProvider('Prelevement');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Prelevement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Prelevement']))
			$model->attributes=$_GET['Prelevement'];

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
		$model=Prelevement::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='prelevement-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * export csv des prelevements.
	 */
	public function actionExportCsv()
	{
		$model = new Prelevement('search');
		$model->unsetAttributes();
		if(isset($_GET['Prelevement']))
			$model->attributes=$_GET['Prelevement'];
		$dataProvider = $model->search();
		$filename = 'liste_prelevements.csv';
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
		$dataProvider=new CActiveDataProvider('Prelevement');
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		$mPDF1->Output('liste_prelevements.pdf', 'I');
	}

	public function actionExportXls(){
		$model = new Prelevement('search');
		$model->unsetAttributes();
		if(isset($_GET['Prelevement']))
			$model->attributes=$_GET['Prelevement'];
		$dataProvider = $model->search()->getData();
		$data = array(1 => array ('Identifiant','Date de prelevement'));
		foreach($dataProvider as $prel){
			$data[]=array($prel->identifier, $prel->date_prelevement);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des prélèvements');
		$xls->addArray($data);
		$xls->generateXML('liste_prelevements');
	}
}
