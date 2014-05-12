<?php
/* @var $this ConteneurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Conteneurs',
);

$this->menu=array(
	array('label'=>'Create Conteneur', 'url'=>array('create')),
	array('label'=>'Manage Conteneur', 'url'=>array('admin')),
);
?>

<h1>Conteneurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
