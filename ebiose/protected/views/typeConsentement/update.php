<?php
/* @var $this TypeConsentementController */
/* @var $model TypeConsentement */

$this->breadcrumbs=array(
	'Type Consentements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TypeConsentement', 'url'=>array('index')),
	array('label'=>'Create TypeConsentement', 'url'=>array('create')),
	array('label'=>'View TypeConsentement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TypeConsentement', 'url'=>array('admin')),
);
?>

<h1>Update TypeConsentement <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>