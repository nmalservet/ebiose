<?php
/* @var $this AnnotationController */
/* @var $model Annotation */

$this->breadcrumbs=array(
	'Annotations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Annotation', 'url'=>array('index')),
	array('label'=>'Create Annotation', 'url'=>array('create')),
	array('label'=>'Update Annotation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Annotation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Annotation', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','view_annotation').' : '.$model->nom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
		array(
				'name'=>'type_annotation',
				'type'=>'html',
				'value'=>$model->getTypeAnnotationString(),
		), 
		array(
				'name'=>'type_annotation',
				'type'=>'html',
				'value'=>$model->getTypeObjetString(),
		),
		array(
				'name'=>'inactive',
				'type'=>'html',
				'value'=>$model->getInactiveString(),
		),
	),
)); ?>
