<?php
/* @var $this TransporteurController */
/* @var $model Transporteur */

$this->breadcrumbs=array(
	'Transporteurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Transporteur', 'url'=>array('index')),
	array('label'=>'Create Transporteur', 'url'=>array('create')),
	array('label'=>'Update Transporteur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Transporteur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Transporteur', 'url'=>array('admin')),
);
?>

<h1>View Transporteur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
		'adresse',
		'ville',
		'pays',
	),
)); ?>
