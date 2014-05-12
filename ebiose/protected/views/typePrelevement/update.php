<?php
/* @var $this TypePrelevementController */
/* @var $model TypePrelevement */

$this->breadcrumbs=array(
	'Type Prelevements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TypePrelevement', 'url'=>array('index')),
	array('label'=>'Create TypePrelevement', 'url'=>array('create')),
	array('label'=>'View TypePrelevement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TypePrelevement', 'url'=>array('admin')),
);
?>

<h1>Update TypePrelevement <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>