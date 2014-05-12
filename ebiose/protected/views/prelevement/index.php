<?php
/* @var $this PrelevementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prelevements',
);

$this->menu=array(
	array('label'=>'Create Prelevement', 'url'=>array('create')),
	array('label'=>'Manage Prelevement', 'url'=>array('admin')),
);
?>

<h1>Prelevements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
