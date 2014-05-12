<?php
/* @var $this TypeEchantillonController */
/* @var $model TypeEchantillon */

$this->breadcrumbs=array(
	'Type Echantillons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TypeEchantillon', 'url'=>array('index')),
	array('label'=>'Create TypeEchantillon', 'url'=>array('create')),
	array('label'=>'Update TypeEchantillon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TypeEchantillon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TypeEchantillon', 'url'=>array('admin')),
);
?>

<h1>View TypeEchantillon #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'nom_en',
		'description',
	),
)); ?>
