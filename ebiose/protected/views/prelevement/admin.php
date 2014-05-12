<?php
/* @var $this PrelevementController */
/* @var $model Prelevement */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prelevement-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('common','admin_prelevement') ;?></h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'prelevement','labelAdd'=>Yii::t('common','ajouter_prelevement'))); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prelevement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'identifier',
		'patient_id',
		'type_prelevement_id',
		'site_provenance_id',
		'description',
		'date_prelevement',
		/*
		'date_creation',
		
		'date_arrivee',
		'transport_step_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
