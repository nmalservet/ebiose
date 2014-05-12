<?php
/* @var $this TransporteurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transporteurs',
);

$this->menu=array(
	array('label'=>'Create Transporteur', 'url'=>array('create')),
	array('label'=>'Manage Transporteur', 'url'=>array('admin')),
);
?>

<h1>Transporteurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
