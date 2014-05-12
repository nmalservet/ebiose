<?php
/* @var $this QuantiteUniteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quantite Unites',
);

$this->menu=array(
	array('label'=>'Create QuantiteUnite', 'url'=>array('create')),
	array('label'=>'Manage QuantiteUnite', 'url'=>array('admin')),
);
?>

<h1>Quantite Unites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
