<?php
/* @var $this TypeProduitDeriveController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Type Produit Derives',
);

$this->menu=array(
	array('label'=>'Create TypeProduitDerive', 'url'=>array('create')),
	array('label'=>'Manage TypeProduitDerive', 'url'=>array('admin')),
);
?>

<h1>Type Produit Derives</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
