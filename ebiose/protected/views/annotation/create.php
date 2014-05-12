<?php
/* @var $this AnnotationController */
/* @var $model Annotation */

$this->breadcrumbs=array(
	'Annotations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Annotation', 'url'=>array('index')),
	array('label'=>'Manage Annotation', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','create_annotation');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>