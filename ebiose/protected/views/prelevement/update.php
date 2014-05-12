<?php
/* @var $this PrelevementController */
/* @var $model Prelevement */

$this->breadcrumbs=array(
	'Prelevements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prelevement', 'url'=>array('index')),
	array('label'=>'Create Prelevement', 'url'=>array('create')),
	array('label'=>'View Prelevement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prelevement', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','update_prelevement').' '.$model->identifier; ?></h1>

<?php echo $this->renderPartial('_form', array(
										'model'=>$model,
										'listSite'=>$listSite,
										'listType'=>$listType,
										'listPatient'=>$listPatient,)); ?>