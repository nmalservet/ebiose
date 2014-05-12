<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Patient', 'url'=>array('index')),
	array('label'=>'Manage Patient', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','create_patient');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>