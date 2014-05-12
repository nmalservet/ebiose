<?php
/* @var $this TypeEchantillonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Type Echantillons',
);

$this->menu=array(
	array('label'=>'Create TypeEchantillon', 'url'=>array('create')),
	array('label'=>'Manage TypeEchantillon', 'url'=>array('admin')),
);
?>

<h1>Type Echantillons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
