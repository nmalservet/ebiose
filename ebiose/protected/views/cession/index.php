<?php
/* @var $this CessionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cessions',
);

$this->menu=array(
	array('label'=>'Create Cession', 'url'=>array('create')),
	array('label'=>'Manage Cession', 'url'=>array('admin')),
);
?>

<h1>Cessions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
