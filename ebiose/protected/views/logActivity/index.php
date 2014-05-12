<?php
/* @var $this LogActivityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log Activities',
);

$this->menu=array(
	array('label'=>'Create LogActivity', 'url'=>array('create')),
	array('label'=>'Manage LogActivity', 'url'=>array('admin')),
);
?>

<h1>Log Activities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
