<?php
/* @var $this DossierController */
/* @var $model Dossier */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dossier-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des dossiers</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'dossier','labelAdd'=>'Ajouter un dossier')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'dossier-grid',
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
