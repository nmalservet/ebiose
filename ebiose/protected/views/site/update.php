<?php
/* @var $this SiteController */
/* @var $model Site */

$this->breadcrumbs=array(
	'Sites'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Site', 'url'=>array('index')),
	array('label'=>'Create Site', 'url'=>array('create')),
	array('label'=>'View Site', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Site', 'url'=>array('admin')),
);
?>

<h1>Modification site : <?php echo $model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>