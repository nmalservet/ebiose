<?php
/* @var $this CessionController */
/* @var $model Cession */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cession-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des cessions</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'cession','labelAdd'=>'Ajouter une cession')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cession-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'contact_id',
		'date_demande',
		'transport_step_id',
		'notes',
		'statut_cession',
		/*
		'demande_cession_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
