<?php
/* @var $this ValueOptionAnalyseController */
/* @var $model ValueOptionAnalyse */

$this->breadcrumbs=array(
	'Value Option Analyses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ValueOptionAnalyse', 'url'=>array('index')),
	array('label'=>'Manage ValueOptionAnalyse', 'url'=>array('admin')),
);
?>

<h1>Create ValueOptionAnalyse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>