<?php
/* @var $this SiteController */
/* @var $model Site */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('site-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administration des sites</h1>


<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'site','labelAdd'=>'Ajouter un site')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php 
	$valeurAdresse;
	if($model->ville == null)
	{$valeurAdresse = $model->adresse.", ".$model->ville;}
	elseif($model->adresse == null)
	{$valeurAdresse = $model->adresse.", ".$model->ville;}
	else
	{$valeurAdresse = $model->adresse.", ".$model->ville;}
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'site-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'description',
		array(
			'name'=>'adresse',
			'type'=>'html',
			'value'=>'$data->getAdresseVille()',
		),
		'pays',
		'finess',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
