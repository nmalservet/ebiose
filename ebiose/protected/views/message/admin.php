<?php
/* @var $this MessageController */
/* @var $model Message */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('message-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Mes Messages</h1>
<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'message','labelAdd'=>'Ajouter un message')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'message-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
				'name'=>'lu',
				'type'=>'html',
				'value'=>'$data->getLu()',
		),
		array(
				'name'=>'auteur',
				'type'=>'html',
				'value'=>'$data->auteurM->nom." ".$data->auteurM->prenom',
		),
		'sujet',
		'date',
		array(
			'class'=>'CButtonColumn',
			'template' => '{view} {delete}',
		),
	),
)); ?>
