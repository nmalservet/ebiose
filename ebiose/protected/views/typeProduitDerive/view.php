<?php
/* @var $this TypeProduitDeriveController */
/* @var $model TypeProduitDerive */

$this->breadcrumbs=array(
	'Type Produit Derives'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TypeProduitDerive', 'url'=>array('index')),
	array('label'=>'Create TypeProduitDerive', 'url'=>array('create')),
	array('label'=>'Update TypeProduitDerive', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TypeProduitDerive', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TypeProduitDerive', 'url'=>array('admin')),
);
?>

<h1>View TypeProduitDerive #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
	),
)); ?>
