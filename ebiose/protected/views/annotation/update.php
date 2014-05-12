<?php
/* @var $this AnnotationController */
/* @var $model Annotation */

$this->breadcrumbs=array(
	'Annotations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Annotation', 'url'=>array('index')),
	array('label'=>'Create Annotation', 'url'=>array('create')),
	array('label'=>'View Annotation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Annotation', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','update_annotation')." : ".$model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>