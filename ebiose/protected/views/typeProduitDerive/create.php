<?php
/* @var $this TypeProduitDeriveController */
/* @var $model TypeProduitDerive */

$this->breadcrumbs=array(
	'Type Produit Derives'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TypeProduitDerive', 'url'=>array('index')),
	array('label'=>'Manage TypeProduitDerive', 'url'=>array('admin')),
);
?>

<h1>Create TypeProduitDerive</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>