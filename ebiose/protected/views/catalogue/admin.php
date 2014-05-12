<?php
/* @var $this CatalogueController */
/* @var $model Catalogue */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('catalogue-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administration des catalogues</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'catalogue','labelAdd'=>'Ajouter un catalogue')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'catalogue-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
