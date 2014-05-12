<?php
/* @var $this QuantiteUniteController */
/* @var $model QuantiteUnite */

$this->breadcrumbs=array(
	'Quantite Unites'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List QuantiteUnite', 'url'=>array('index')),
	array('label'=>'Create QuantiteUnite', 'url'=>array('create')),
	array('label'=>'View QuantiteUnite', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage QuantiteUnite', 'url'=>array('admin')),
);
?>

<h1>Update QuantiteUnite <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>