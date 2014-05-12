<?php
/* @var $this AnnotationController */
/* @var $model Annotation */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('annotation-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('common','admin_annotation');?></h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'annotation','labelAdd'=>Yii::t('common','ajouter_annotation'))); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'annotation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'description',
		array(
				'name'=>'type_annotation',
				'type'=>'html',
				'value'=>'$data->getTypeAnnotationString()',
		),
		array(
				'name'=>'type_objet',
				'type'=>'html',
				'value'=>'$data->getTypeObjetString()',
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
