<?php
/* @var $this DossierController */
/* @var $model Dossier */
/* @var $noeud Noeud */

$this->breadcrumbs=array(
	'Dossiers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dossier', 'url'=>array('index')),
	array('label'=>'Manage Dossier', 'url'=>array('admin')),
);
?>

<h1>Créer un dossier</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'noeud'=>$noeud)); ?>