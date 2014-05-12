<?php
/* @var $this NewsController */
/* @var $model News */


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Les news</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'news','labelAdd'=>'Ajouter une new')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
				'name'=>'auteur',
				'type'=>'html',
				'value'=>'$data->auteur->nom." ".$data->auteur->prenom',
		),
		'sujet',
		//'contenu',
		'creation_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
