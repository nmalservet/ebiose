<?php
/* @var $this NiveauImportanceNonConformiteController */
/* @var $model NiveauImportanceNonConformite */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('niveau-importance-non-conformite-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des niveaux d' importance des non-conformités</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'niveauImportanceNonConformite','labelAdd'=>'Ajouter un niveau')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'niveau-importance-non-conformite-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nom',
		'priorite',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
