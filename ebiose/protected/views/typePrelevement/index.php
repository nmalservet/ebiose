<?php
/* @var $this TypePrelevementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Type Prelevements',
);

$this->menu=array(
	array('label'=>'Create TypePrelevement', 'url'=>array('create')),
	array('label'=>'Manage TypePrelevement', 'url'=>array('admin')),
);
?>

<h1>Type Prelevements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
