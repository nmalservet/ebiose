<?php

class PatientController extends BSFController
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
		$criteria->compare('type_objet',array_search("Patient", Constants::getTypeObjetAnnotationOption(),true));
		$criteria->compare('inactive',false);
		$modelAnnot=Annotation::model()->findAll($criteria);
		$attribue=array();
		$listResultatAnnotation=array();
		$patient=Patient::model()->findByPk($id);
		$i=0;
		foreach($modelAnnot as $annot)
		{
			$resultatAnnot;
			switch($annot->type_annotation)
			{
				case Constants::ANNOTATION_TEXT:
					$resultatAnnot=ResultatAnnotationTexte::model()->loadModel($annot->id,$id);
					$attribue[$i]=array(
										'label'=>$resultatAnnot->annotation->nom,
										'type'=>'html',
										'value'=>$resultatAnnot->getValeurString()
								);
					break;
					/*
					 case Constants::ANNOTATION_TEXTAREA:
					$resultatAnnot=new ;
					break;
					case Constants::ANNOTATION_SELECT_LIST:
					$resultatAnnot=new ;
					break;
					case Constants::ANNOTATION_CHECKBOX:
					$resultatAnnot=new ;
					break;
					*/
			}
			$resultatAnnot->type_objet = Constants::ANNOTATION_PATIENT;
			$listResultatAnnotation[$i]=$resultatAnnot;
			$i++;
		}
		
		$dataProviderAnnotation=new CArrayDataProvider($listResultatAnnotation);
		$modelPrelevement=new Prelevement;
		$modelPrelevement->patient_id=$id;
		$dataProviderPrelevement=$modelPrelevement->search();
		$this->render('view',array(
				'model'=>$this->loadModel($id),
				'attribue'=>$attribue,
				'dataProviderAnnotation'=>$dataProviderAnnotation,
				'dataProviderPrelevement'=>$dataProviderPrelevement,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Patient;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Patient']))
		{
			$model->attributes=$_POST['Patient'];
			if($model->save())
				$this->redirect(array('createAnnotation','idPatient'=>$model->id));
		}

		$this->render('create',array(
				'model'=>$model,
		));
	}
	
	public function actionCreateAnnotation($idPatient)
	{
		if(isset($_POST['listResultatAnnotation']))
		{
			foreach($_POST['listResultatAnnotation'] as $resultat)
			{
				$idAnnotation = array_search ($resultat,$_POST['listResultatAnnotation'], true);
				$model;
				$annot=Annotation::model()->findByPk($idAnnotation);
				switch($annot->type_annotation)
				{
					case Constants::ANNOTATION_TEXT:
						$model=new ResultatAnnotationTexte;
						$model->valeur=$resultat;
						break;
						/*
					case Constants::ANNOTATION_TEXTAREA:
						$model=new ResultatAnnotationTexteArea;
						$model->valeur=$resultat;
						break;
					case Constants::ANNOTATION_SELECT_LIST:
						$model=new ResultatAnnotationSelectList;
						$model->valeur=$resultat;
						break;
					case Constants::ANNOTATION_CHECKBOX:
						$model=new ResultatAnnotationCheckBox;
						$model->valeur=$resultat;
						break;
						*/
				}
				$model->annotation_id=$idAnnotation;
				$model->objet_id=$idPatient;
				$model->type_objet=Constants::ANNOTATION_PATIENT;
				$model->save();
			}
			$this->redirect(array('view','id'=>$idPatient));
		}
		else
		{
			$criteria=new CDbCriteria;
			$criteria->compare('type_objet',array_search("Patient", Constants::getTypeObjetAnnotationOption(),true));
			$criteria->compare('inactive',false);
			$modelAnnot=Annotation::model()->findAll($criteria);
			
			$modelList=new ListResultatAnnotationForm();
			$modelList->listResultatAnnotation=array();
			$patient=Patient::model()->findByPk($idPatient);
			$i=0;
			foreach($modelAnnot as $annot)
			{
				$resultatAnnot;
				switch($annot->type_annotation)
				{
					case Constants::ANNOTATION_TEXT:
						$resultatAnnot=new ResultatAnnotationTexte();
						break;
						/*
							case Constants::ANNOTATION_TEXTAREA:
						$resultatAnnot=new ;
						break;
						case Constants::ANNOTATION_SELECT_LIST:
						$resultatAnnot=new ;
						break;
						case Constants::ANNOTATION_CHECKBOX:
						$resultatAnnot=new ;
						break;
						*/
				}
				$resultatAnnot->annotation_id = $annot->id;
				$resultatAnnot->type_objet = Constants::ANNOTATION_PATIENT;
				$modelList->listResultatAnnotation[$i]=$resultatAnnot;
				$i++;
			}
			if($i==0)
			{
				$this->redirect(array('view','id'=>$idPatient));
			}
			else
			{
				$this->render('create_annotation',array(
						'model'=>$modelList,
						'patient'=>$patient,
				));
			}
		}
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

		if(isset($_POST['Patient']))
		{
			$model->attributes=$_POST['Patient'];
			if($model->save())
				$this->redirect(array('updateAnnotation','id'=>$model->id));
		}
		else 
		{
			$this->render('update',array(
					'model'=>$model,
			));
		}
	}
	
	public function actionUpdateAnnotation($id)
	{
		if(isset($_POST['listResultatAnnotation']))
		{
			foreach($_POST['listResultatAnnotation'] as $resultat)
			{
				$idAnnotation = array_search ($resultat,$_POST['listResultatAnnotation'], true);
				$model;
				$annot=Annotation::model()->findByPk($idAnnotation);
				switch($annot->type_annotation)
				{
					case Constants::ANNOTATION_TEXT:
						$model=ResultatAnnotationTexte::model()->loadModel($idAnnotation,$id);
						$model->valeur=$resultat;
						$model->type_objet=Constants::ANNOTATION_PATIENT;
						break;
						/*
							case Constants::ANNOTATION_TEXTAREA:
						$model=new ResultatAnnotationTexteArea;
						$model->valeur=$resultat;
						break;
						case Constants::ANNOTATION_SELECT_LIST:
						$model=new ResultatAnnotationSelectList;
						$model->valeur=$resultat;
						break;
						case Constants::ANNOTATION_CHECKBOX:
						$model=new ResultatAnnotationCheckBox;
						$model->valeur=$resultat;
						break;
						*/
				}
				$model->save();
			}
			$this->redirect(array('view','id'=>$id));
		}
		else
		{
			$criteria=new CDbCriteria;
			$criteria->compare('type_objet',array_search("Patient", Constants::getTypeObjetAnnotationOption(),true));
			$criteria->compare('inactive',false);
			$modelAnnot=Annotation::model()->findAll($criteria);
			
			$modelList=new ListResultatAnnotationForm();
			$modelList->listResultatAnnotation=array();
			$patient=Patient::model()->findByPk($id);
			$i=0;
			foreach($modelAnnot as $annot)
			{
				$resultatAnnot;
				switch($annot->type_annotation)
				{
					case Constants::ANNOTATION_TEXT:
						$resultatAnnot=ResultatAnnotationTexte::model()->loadModel($annot->id,$id);
						break;
						/*
						 case Constants::ANNOTATION_TEXTAREA:
						$resultatAnnot=new ;
						break;
						case Constants::ANNOTATION_SELECT_LIST:
						$resultatAnnot=new ;
						break;
						case Constants::ANNOTATION_CHECKBOX:
						$resultatAnnot=new ;
						break;
						*/
				}
				$resultatAnnot->type_objet = Constants::ANNOTATION_PATIENT;
				$modelList->listResultatAnnotation[$i]=$resultatAnnot;
				$i++;
			}
			if($i==0)
			{
				$this->redirect(array('view','id'=>$id));
			}
			else
			{
				$this->render('update_annotation',array(
						'model'=>$modelList,
						'patient'=>$patient,
				));
			}
		}
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
		$dataProvider=new CActiveDataProvider('Patient');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Patient('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Patient']))
			$model->attributes=$_GET['Patient'];

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
		$model=Patient::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='patient-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * export csv des patients.
	 */
	public function actionExportCsv()
	{
		$model = new Patient('search');
		$model->unsetAttributes();
		if(isset($_GET['Patient']))
			$model->attributes=$_GET['Patient'];
		$dataProvider = $model->search();
		$filename = 'liste_patients.csv';
		$csv = new ECSVExport($dataProvider);
		$csv->exportCurrentPageOnly();
		Yii::app()->getRequest()->sendFile($filename, $csv->toCSV(), "text/csv", false);
	}

	/**
	 * export pdf avec mpdf et liste  d'index : Technique HTML to PDF
	 */
	public function actionExportPdf()
	{
		# mPDF
		$mPDF1 = Yii::app()->ePdf->mpdf();
		$dataProvider=new CActiveDataProvider('Patient');
		# Load a stylesheet
		// 		$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
		// 		$mPDF1->WriteHTML($stylesheet, 1);
		# renderPartial (only 'view' of current controller)
		$mPDF1->WriteHTML($this->renderPartial('index', array('dataProvider'=>$dataProvider), true));
		# Renders image
		//$mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif' ));
		# Outputs ready PDF
		$mPDF1->Output('liste_patients.pdf', 'I');
	}
	
	public function actionExportXls(){
		$model = new Patient('search');
		$model->unsetAttributes();
		if(isset($_GET['Patient']))
			$model->attributes=$_GET['Patient'];
		$dataProvider = $model->search()->getData();
		$data = array(
				1 => array ('Nom', 'Prenom','Date de naissance'),
// 				array('Schwarz', 'Oliver'),
// 				array('Test', 'Peter')
		);
		foreach($dataProvider as $pat){
			$data[]=array($pat->nom_usuel, $pat->prenom, $pat->date_naissance);
		}
		Yii::import('application.extensions.phpexcel.JPhpExcel');
		$xls = new JPhpExcel('UTF-8', false, 'Liste des patients');
		$xls->addArray($data);
		$xls->generateXML('liste_patients');
	}
}
