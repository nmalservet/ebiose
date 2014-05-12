<?php
/* @var $this LogActivityController */
/* @var $model LogActivity */

$this->breadcrumbs=array(
	'Log Activities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LogActivity', 'url'=>array('index')),
	array('label'=>'Create LogActivity', 'url'=>array('create')),
	array('label'=>'Update LogActivity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LogActivity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LogActivity', 'url'=>array('admin')),
);
?>

<h1>View LogActivity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'action',
		'user_id',
		'element_id',
		'table_id',
		'field_id',
		'old_value',
		'new_value',
		'date_action',
	),
)); ?>
