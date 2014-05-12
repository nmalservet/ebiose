<?php
/* @var $this TypePrelevementController */
/* @var $model TypePrelevement */

$this->breadcrumbs=array(
	'Type Prelevements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TypePrelevement', 'url'=>array('index')),
	array('label'=>'Create TypePrelevement', 'url'=>array('create')),
	array('label'=>'Update TypePrelevement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TypePrelevement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TypePrelevement', 'url'=>array('admin')),
);
?>

<h1>View TypePrelevement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
	),
)); ?>
