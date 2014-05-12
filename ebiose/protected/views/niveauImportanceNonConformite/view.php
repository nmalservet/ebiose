<?php
/* @var $this NiveauImportanceNonConformiteController */
/* @var $model NiveauImportanceNonConformite */

$this->breadcrumbs=array(
	'Niveau Importance Non Conformites'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NiveauImportanceNonConformite', 'url'=>array('index')),
	array('label'=>'Create NiveauImportanceNonConformite', 'url'=>array('create')),
	array('label'=>'Update NiveauImportanceNonConformite', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NiveauImportanceNonConformite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NiveauImportanceNonConformite', 'url'=>array('admin')),
);
?>

<h1>View NiveauImportanceNonConformite #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'priorite',
		'description',
	),
)); ?>
