<?php
/* @var $this NiveauImportanceNonConformiteController */
/* @var $model NiveauImportanceNonConformite */

$this->breadcrumbs=array(
	'Niveau Importance Non Conformites'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NiveauImportanceNonConformite', 'url'=>array('index')),
	array('label'=>'Create NiveauImportanceNonConformite', 'url'=>array('create')),
	array('label'=>'View NiveauImportanceNonConformite', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NiveauImportanceNonConformite', 'url'=>array('admin')),
);
?>

<h1>Update NiveauImportanceNonConformite <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>