<?php
/* @var $this NiveauImportanceNonConformiteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Niveau Importance Non Conformites',
);

$this->menu=array(
	array('label'=>'Create NiveauImportanceNonConformite', 'url'=>array('create')),
	array('label'=>'Manage NiveauImportanceNonConformite', 'url'=>array('admin')),
);
?>

<h1>Niveau Importance Non Conformites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
