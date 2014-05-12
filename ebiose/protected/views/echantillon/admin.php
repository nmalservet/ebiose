<?php
/* @var $this EchantillonController */
/* @var $model echantillon */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('echantillon-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des échantillons</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'echantillon','labelAdd'=>'Ajouter un échantillon')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'echantillon-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'type_id',
		array(
			'name'=>'site_provenance_id',
			'type'=>'html',
			'value'=>'$data->getNomSiteProvenance()',
		),
		'identifier',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>