<?php
/* @var $this ReservationMachineController */
/* @var $model ReservationMachine */

$this->breadcrumbs=array(
	'Reservation Machines'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReservationMachine', 'url'=>array('index')),
	array('label'=>'Create ReservationMachine', 'url'=>array('create')),
	array('label'=>'View ReservationMachine', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReservationMachine', 'url'=>array('admin')),
);
?>

<h1>Update ReservationMachine <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>