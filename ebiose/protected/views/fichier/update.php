<?php
/* @var $this FichierController */
/* @var $model Fichier */

$this->breadcrumbs=array(
	'Fichiers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fichier', 'url'=>array('index')),
	array('label'=>'Create Fichier', 'url'=>array('create')),
	array('label'=>'View Fichier', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Fichier', 'url'=>array('admin')),
);
?>

<h1>Update Fichier <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>