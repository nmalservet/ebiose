<?php
/* @var $this FichierController */
/* @var $model Fichier */

$this->breadcrumbs=array(
	'Fichiers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fichier', 'url'=>array('index')),
	array('label'=>'Manage Fichier', 'url'=>array('admin')),
);
?>

<h1>Create Fichier</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>