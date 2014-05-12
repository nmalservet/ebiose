<?php
/* @var $this TransporteurController */
/* @var $model Transporteur */

$this->breadcrumbs=array(
	'Transporteurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transporteur', 'url'=>array('index')),
	array('label'=>'Create Transporteur', 'url'=>array('create')),
	array('label'=>'View Transporteur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Transporteur', 'url'=>array('admin')),
);
?>

<h1>Update Transporteur <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>