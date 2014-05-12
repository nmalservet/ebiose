<?php
/* @var $this FichierController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fichiers',
);

$this->menu=array(
	array('label'=>'Create Fichier', 'url'=>array('create')),
	array('label'=>'Manage Fichier', 'url'=>array('admin')),
);
?>

<h1>Fichiers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
