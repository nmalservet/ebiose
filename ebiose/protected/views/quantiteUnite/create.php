<?php
/* @var $this QuantiteUniteController */
/* @var $model QuantiteUnite */

$this->breadcrumbs=array(
	'Quantite Unites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuantiteUnite', 'url'=>array('index')),
	array('label'=>'Manage QuantiteUnite', 'url'=>array('admin')),
);
?>

<h1>Create QuantiteUnite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>