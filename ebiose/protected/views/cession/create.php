<?php
/* @var $this CessionController */
/* @var $model Cession */

$this->breadcrumbs=array(
	'Cessions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cession', 'url'=>array('index')),
	array('label'=>'Manage Cession', 'url'=>array('admin')),
);
?>

<h1>Create Cession</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>