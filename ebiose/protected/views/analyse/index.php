<?php
/* @var $this AnalyseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Analyses',
);

$this->menu=array(
	array('label'=>'Create Analyse', 'url'=>array('create')),
	array('label'=>'Manage Analyse', 'url'=>array('admin')),
);
?>

<h1>Analyses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
