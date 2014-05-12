<?php
/* @var $this CessionController */
/* @var $model Cession */

$this->breadcrumbs=array(
	'Cessions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cession', 'url'=>array('index')),
	array('label'=>'Create Cession', 'url'=>array('create')),
	array('label'=>'Update Cession', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cession', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cession', 'url'=>array('admin')),
);
?>

<h1>View Cession #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'contact_id',
		'date_demande',
		'transport_step_id',
		'notes',
		'statut_cession',
		'demande_cession_id',
	),
)); ?>
