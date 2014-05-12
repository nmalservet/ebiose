<?php
/* @var $this QuantiteUniteController */
/* @var $model QuantiteUnite */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('quantite-unite-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Quantite Unites</h1>

<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'quantite-unite-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nom',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
