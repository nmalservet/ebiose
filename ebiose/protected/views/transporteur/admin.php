<?php
/* @var $this TransporteurController */
/* @var $model Transporteur */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('transporteur-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des transporteurs</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'transporteur','labelAdd'=>'Ajouter un transporteur')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transporteur-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'description',
		'adresse',
		'ville',
		'pays',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
