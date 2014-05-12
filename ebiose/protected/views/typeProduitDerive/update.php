<?php
/* @var $this TypeProduitDeriveController */
/* @var $model TypeProduitDerive */

$this->breadcrumbs=array(
	'Type Produit Derives'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TypeProduitDerive', 'url'=>array('index')),
	array('label'=>'Create TypeProduitDerive', 'url'=>array('create')),
	array('label'=>'View TypeProduitDerive', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TypeProduitDerive', 'url'=>array('admin')),
);
?>

<h1>Update TypeProduitDerive <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>