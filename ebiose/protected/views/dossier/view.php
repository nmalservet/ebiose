<?php
/* @var $this DossierController */
/* @var $model Dossier */

$this->breadcrumbs=array(
	'Dossiers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dossier', 'url'=>array('index')),
	array('label'=>'Create Dossier', 'url'=>array('create')),
	array('label'=>'Update Dossier', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dossier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dossier', 'url'=>array('admin')),
);
?>

<h1>Dossier <?php echo $model->nom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
		array(
				'name'=>'parent_id',
				'type'=>'html',
				'value'=>isset($model->parent->nom) ? $model->parent->nom : "Dossier à la racine",
		),
	),
)); ?>
