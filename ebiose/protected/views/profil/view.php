<?php
/* @var $this ProfilController */
/* @var $model Profil */

$this->breadcrumbs=array(
	'Profils'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Profil', 'url'=>array('index')),
	array('label'=>'Create Profil', 'url'=>array('create')),
	array('label'=>'Update Profil', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Profil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profil', 'url'=>array('admin')),
);
?>

<h1>View Profil #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
	),
)); ?>
