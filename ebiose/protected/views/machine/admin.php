<?php
/* @var $this MachineController */
/* @var $model Machine */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('machine-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des machines</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'machine','labelAdd'=>'Ajouter une machine')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'machine-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'description',
			array(
					'name'=>'couleur',
					'type'=>'raw',
					'value'=>'$data->renderCouleur()',
			),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
