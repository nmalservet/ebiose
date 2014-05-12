<?php
/* @var $this PatientController */
/* @var $model ListResultatAnnotationForm */
/* @var $patient Patient */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Patient', 'url'=>array('index')),
	array('label'=>'Manage Patient', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','create_annotation_patient')." : ".$patient->ipp." ".$patient->nom_usuel." ".$patient->date_naissance;?></h1>
<?php echo $this->renderPartial('../layouts/_form_annotation', array('model'=>$model)); ?>