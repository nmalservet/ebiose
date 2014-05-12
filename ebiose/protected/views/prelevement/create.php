<?php
/* @var $this PrelevementController */
/* @var $model Prelevement */

$this->breadcrumbs=array(
	'Prelevements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prelevement', 'url'=>array('index')),
	array('label'=>'Manage Prelevement', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','create_prelevement');?></h1>

<?php echo $this->renderPartial('_form', array(
										'model'=>$model,
										'listSite'=>$listSite,
										'listType'=>$listType,
										'listPatient'=>$listPatient,)); ?>