<?php
/* @var $this TypeEchantillonController */
/* @var $model TypeEchantillon */

$this->breadcrumbs=array(
	'Type Echantillons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TypeEchantillon', 'url'=>array('index')),
	array('label'=>'Manage TypeEchantillon', 'url'=>array('admin')),
);
?>

<h1>Create TypeEchantillon</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>