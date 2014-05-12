<?php
/* @var $this AnalyseController */
/* @var $model Analyse */

$this->breadcrumbs=array(
	'Analyses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Analyse', 'url'=>array('index')),
	array('label'=>'Create Analyse', 'url'=>array('create')),
	array('label'=>'View Analyse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Analyse', 'url'=>array('admin')),
);
?>

<h1>Modifier une analyse : <?php echo $model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>