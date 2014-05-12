<?php
/* @var $this AnalyseController */
/* @var $model Analyse */

$this->breadcrumbs=array(
	'Analyses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Analyse', 'url'=>array('index')),
	array('label'=>'Create Analyse', 'url'=>array('create')),
	array('label'=>'Update Analyse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Analyse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Analyse', 'url'=>array('admin')),
);
?>

<h1>analyse : <?php echo $model->nom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
		array(
				'name'=>'type_analyse',
				'type'=>'html',
				'value'=>$model->getTypeAnalyse(),
		),
		array(
				'name'=>'machine_id',
				'type'=>'html',
				'value'=>$model->getNomMachine(),
		),
		array(
				'name'=>'inactive',
				'type'=>'html',
				'value'=>$model->getInactiveString(),
		),
	),
)); ?>
