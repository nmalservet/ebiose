<?php
/* @var $this TypeConsentementController */
/* @var $model TypeConsentement */

$this->breadcrumbs=array(
	'Type Consentements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TypeConsentement', 'url'=>array('index')),
	array('label'=>'Create TypeConsentement', 'url'=>array('create')),
	array('label'=>'Update TypeConsentement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TypeConsentement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TypeConsentement', 'url'=>array('admin')),
);
?>

<h1>View TypeConsentement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nom',
		'description',
	),
)); ?>
