<?php
/* @var $this NonConformiteController */
/* @var $model NonConformite */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('non-conformite-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('common','admin_non_conformite') ?></h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'nonConformite','labelAdd'=>'Ajouter une non-conformité')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'non-conformite-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'date_creation',
		'date_debut_nc',
		'date_fin_nc',
		'description',
		array(
			'name'=>'niveau_importance_id',
			'type'=>'html',
			'value'=>'$data->niveau->nom',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
