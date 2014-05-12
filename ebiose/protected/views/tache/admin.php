<?php
/* @var $this TacheController */
/* @var $model Tache */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tache-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des tâches</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'tache','labelAdd'=>'Ajouter une tâche')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tache-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'description',
		'date_limite',
		'date_creation',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
