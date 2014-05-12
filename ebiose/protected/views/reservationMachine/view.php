<?php
/* @var $this ReservationMachineController */
/* @var $model ReservationMachine */

$this->breadcrumbs=array(
	'Reservation Machines'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReservationMachine', 'url'=>array('index')),
	array('label'=>'Create ReservationMachine', 'url'=>array('create')),
	array('label'=>'Update ReservationMachine', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReservationMachine', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReservationMachine', 'url'=>array('admin')),
);
?>

<h1>View ReservationMachine #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'machine_id',
		'start_date',
		'end_date',
		'user_id',
		'message',
	),
)); ?>
