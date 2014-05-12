<?php
/* @var $this ValueOptionAnalyseController */
/* @var $model ValueOptionAnalyse */

$this->breadcrumbs=array(
	'Value Option Analyses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ValueOptionAnalyse', 'url'=>array('index')),
	array('label'=>'Create ValueOptionAnalyse', 'url'=>array('create')),
	array('label'=>'Update ValueOptionAnalyse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ValueOptionAnalyse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ValueOptionAnalyse', 'url'=>array('admin')),
);
?>

<h1>View ValueOptionAnalyse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_analyse',
		'valeur',
	),
)); ?>
