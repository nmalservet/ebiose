<?php
/* @var $this FichierController */
/* @var $model Fichier */

$this->breadcrumbs=array(
	'Fichiers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Fichier', 'url'=>array('index')),
	array('label'=>'Create Fichier', 'url'=>array('create')),
	array('label'=>'Update Fichier', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Fichier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fichier', 'url'=>array('admin')),
);
?>

<h1>View Fichier #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
		'suffixe',
		'dossier_id',
	),
)); ?>
