<?php
/* @var $this TypePrelevementController */
/* @var $model TypePrelevement */

$this->breadcrumbs=array(
	'Type Prelevements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TypePrelevement', 'url'=>array('index')),
	array('label'=>'Manage TypePrelevement', 'url'=>array('admin')),
);
?>

<h1>Create TypePrelevement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>