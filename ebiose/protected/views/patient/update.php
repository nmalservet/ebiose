<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Patient', 'url'=>array('index')),
	array('label'=>'Create Patient', 'url'=>array('create')),
	array('label'=>'View Patient', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Patient', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','update_patient').' : '.$model->ipp." ".$model->nom_usuel." ".$model->date_naissance; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>