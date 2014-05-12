<?php
/* @var $this EchantillonController */
/* @var $model echantillon */

$this->breadcrumbs=array(
	'Echantillons'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List echantillon', 'url'=>array('index')),
	array('label'=>'Create echantillon', 'url'=>array('create')),
	array('label'=>'View echantillon', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage echantillon', 'url'=>array('admin')),
);
?>

<h1>Modifier un echantillon <?php echo $model->identifier; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>