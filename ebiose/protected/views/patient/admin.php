<?php
/* @var $this PatientController */
/* @var $model Patient */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('patient-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('common','admin_patient')?></h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'patient','labelAdd'=>Yii::t('common','ajouter_patient'))); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'patient-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ipp',
		'nom_usuel',
		'prenom',
		'nom_naissance',
		'date_naissance',
		array(
				'name'=>'sexe',
				'type'=>'html',
				'value'=>'$data->getSexeString()',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
