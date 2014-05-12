<?php
/* @var $this TacheController */
/* @var $model Tache */

$this->breadcrumbs=array(
	'Taches'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tache', 'url'=>array('index')),
	array('label'=>'Create Tache', 'url'=>array('create')),
	array('label'=>'View Tache', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tache', 'url'=>array('admin')),
);
?>

<h1>Update Tache <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>