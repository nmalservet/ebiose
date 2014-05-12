<?php
/* @var $this DossierController */
/* @var $model Dossier */
/* @var $noeud Noeud */

$this->breadcrumbs=array(
	'Dossiers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dossier', 'url'=>array('index')),
	array('label'=>'Create Dossier', 'url'=>array('create')),
	array('label'=>'View Dossier', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dossier', 'url'=>array('admin')),
);
?>

<h1>Modifier un dossier : <?php echo $model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'noeud'=>$noeud)); ?>