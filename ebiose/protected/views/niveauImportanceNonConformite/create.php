<?php
/* @var $this NiveauImportanceNonConformiteController */
/* @var $model NiveauImportanceNonConformite */

$this->breadcrumbs=array(
	'Niveau Importance Non Conformites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NiveauImportanceNonConformite', 'url'=>array('index')),
	array('label'=>'Manage NiveauImportanceNonConformite', 'url'=>array('admin')),
);
?>

<h1>Create NiveauImportanceNonConformite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>