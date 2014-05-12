<?php
/* @var $this AnnotationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Annotations',
);

$this->menu=array(
	array('label'=>'Create Annotation', 'url'=>array('create')),
	array('label'=>'Manage Annotation', 'url'=>array('admin')),
);
?>

<h1>Annotations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
