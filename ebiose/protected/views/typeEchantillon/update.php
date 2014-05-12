<?php
/* @var $this TypeEchantillonController */
/* @var $model TypeEchantillon */

$this->breadcrumbs=array(
	'Type Echantillons'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TypeEchantillon', 'url'=>array('index')),
	array('label'=>'Create TypeEchantillon', 'url'=>array('create')),
	array('label'=>'View TypeEchantillon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TypeEchantillon', 'url'=>array('admin')),
);
?>

<h1>Update TypeEchantillon <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>