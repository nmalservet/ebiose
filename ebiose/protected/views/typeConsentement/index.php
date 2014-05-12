<?php
/* @var $this TypeConsentementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Type Consentements',
);

$this->menu=array(
	array('label'=>'Create TypeConsentement', 'url'=>array('create')),
	array('label'=>'Manage TypeConsentement', 'url'=>array('admin')),
);
?>

<h1>Type Consentements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
