<?php
/* @var $this TypeConsentementController */
/* @var $model TypeConsentement */

$this->breadcrumbs=array(
	'Type Consentements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TypeConsentement', 'url'=>array('index')),
	array('label'=>'Manage TypeConsentement', 'url'=>array('admin')),
);
?>

<h1>Create TypeConsentement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>