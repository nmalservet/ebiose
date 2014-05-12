<?php
/* @var $this ValueOptionAnalyseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Value Option Analyses',
);

$this->menu=array(
	array('label'=>'Create ValueOptionAnalyse', 'url'=>array('create')),
	array('label'=>'Manage ValueOptionAnalyse', 'url'=>array('admin')),
);
?>

<h1>Value Option Analyses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
