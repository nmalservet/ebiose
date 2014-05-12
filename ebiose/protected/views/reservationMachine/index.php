<?php
/* @var $this ReservationMachineController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reservation Machines',
);

$this->menu=array(
	array('label'=>'Create ReservationMachine', 'url'=>array('create')),
	array('label'=>'Manage ReservationMachine', 'url'=>array('admin')),
);
?>

<h1>Reservation Machines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
