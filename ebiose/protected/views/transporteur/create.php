<?php
/* @var $this TransporteurController */
/* @var $model Transporteur */

$this->breadcrumbs=array(
	'Transporteurs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Transporteur', 'url'=>array('index')),
	array('label'=>'Manage Transporteur', 'url'=>array('admin')),
);
?>

<h1>Create Transporteur</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>