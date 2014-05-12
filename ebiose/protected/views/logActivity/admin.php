<?php
/* @var $this LogActivityController */
/* @var $model LogActivity */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('log-activity-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Vue des journaux système</h1>

<?php 
$imagesearch = CHtml::image('./images/zoom.png', 'Recherche avancée');
echo CHtml::link($imagesearch.'Recherche avancée','#',array('class'=>'search-button'));?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'log-activity-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'action',
		'user_id',
		'element_id',
		'table_id',
		'field_id',
		/*
		'old_value',
		'new_value',
		'date_action',
		*/
		array(
			'class'=>'CButtonColumn',
				'template'=>'{view}'
		),
	),
)); ?>
