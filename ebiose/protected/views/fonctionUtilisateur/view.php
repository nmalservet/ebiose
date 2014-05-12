<?php
/* @var $this FonctionUtilisateurController */
/* @var $model FonctionUtilisateur */

$this->breadcrumbs=array(
	'Fonction Utilisateurs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FonctionUtilisateur', 'url'=>array('index')),
	array('label'=>'Create FonctionUtilisateur', 'url'=>array('create')),
	array('label'=>'Update FonctionUtilisateur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FonctionUtilisateur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FonctionUtilisateur', 'url'=>array('admin')),
);
?>

<h1>View FonctionUtilisateur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'nom_en',
		'description',
	),
)); ?>
