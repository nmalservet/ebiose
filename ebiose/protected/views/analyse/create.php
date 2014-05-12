<?php
/* @var $this AnalyseController */
/* @var $model Analyse */

$this->breadcrumbs=array(
	'Analyses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Analyse', 'url'=>array('index')),
	array('label'=>'Manage Analyse', 'url'=>array('admin')),
);
?>

<h1>Ajouter une analyse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>