<?php
/* @var $this LogActivityController */
/* @var $model LogActivity */

$this->breadcrumbs=array(
	'Log Activities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogActivity', 'url'=>array('index')),
	array('label'=>'Manage LogActivity', 'url'=>array('admin')),
);
?>

<h1>Create LogActivity</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>