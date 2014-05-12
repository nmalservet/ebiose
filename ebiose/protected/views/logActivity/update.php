<?php
/* @var $this LogActivityController */
/* @var $model LogActivity */

$this->breadcrumbs=array(
	'Log Activities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogActivity', 'url'=>array('index')),
	array('label'=>'Create LogActivity', 'url'=>array('create')),
	array('label'=>'View LogActivity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LogActivity', 'url'=>array('admin')),
);
?>

<h1>Update LogActivity <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>