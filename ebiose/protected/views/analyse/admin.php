<?php
/* @var $this AnalyseController */
/* @var $model Analyse */


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('analyse-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des analyses</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'analyse','labelAdd'=>'Ajouter une analyse')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'analyse-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'description',
		array(
				'name'=>'type_analyse',
				'type'=>'html',
				'value'=>'$data->getTypeAnalyse()',
		),
		array(
				'name'=>'machine_id',
				'type'=>'html',
				'value'=>'$data->getNomMachine()',
		),
		array(
				'name'=>'inactive',
				'type'=>'html',
				'value'=>'$data->getInactiveString()',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
