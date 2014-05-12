<?php
/* @var $this TacheController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Taches',
);

$this->menu=array(
	array('label'=>'Create Tache', 'url'=>array('create')),
	array('label'=>'Manage Tache', 'url'=>array('admin')),
);
?>

<h1>Taches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
