<?php
/* @var $this ValueOptionAnalyseController */
/* @var $model ValueOptionAnalyse */

$this->breadcrumbs=array(
	'Value Option Analyses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ValueOptionAnalyse', 'url'=>array('index')),
	array('label'=>'Create ValueOptionAnalyse', 'url'=>array('create')),
	array('label'=>'View ValueOptionAnalyse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ValueOptionAnalyse', 'url'=>array('admin')),
);
?>

<h1>Update ValueOptionAnalyse <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>