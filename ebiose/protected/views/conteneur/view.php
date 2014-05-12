<?php
/* @var $this ConteneurController */
/* @var $model Conteneur */

$this->breadcrumbs=array(
	'Conteneurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Conteneur', 'url'=>array('index')),
	array('label'=>'Create Conteneur', 'url'=>array('create')),
	array('label'=>'Update Conteneur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Conteneur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Conteneur', 'url'=>array('admin')),
);
?>

<h1>View Conteneur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
		'nb_max_emplacements',
		'parent_id',
		'type_conteneur',
	),
)); ?>
