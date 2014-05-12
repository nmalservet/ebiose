<?php
/* @var $this CessionController */
/* @var $model Cession */

$this->breadcrumbs=array(
	'Cessions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cession', 'url'=>array('index')),
	array('label'=>'Create Cession', 'url'=>array('create')),
	array('label'=>'View Cession', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cession', 'url'=>array('admin')),
);
?>

<h1>Update Cession <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>