<?php
/* @var $this QuantiteUniteController */
/* @var $model QuantiteUnite */

$this->breadcrumbs=array(
	'Quantite Unites'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QuantiteUnite', 'url'=>array('index')),
	array('label'=>'Create QuantiteUnite', 'url'=>array('create')),
	array('label'=>'Update QuantiteUnite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QuantiteUnite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuantiteUnite', 'url'=>array('admin')),
);
?>

<h1>View QuantiteUnite #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
	),
)); ?>
