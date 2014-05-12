<?php
/* @var $this NonConformiteController */
/* @var $model NonConformite */

?>

<h1><?php echo Yii::t('common','view_non_conformite')." ".$model->nom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nom',
		'date_creation',
		'date_debut_nc',
		'date_fin_nc',
		'description',
		array(
			'name'=>'niveau_importance_id',
			'type'=>'html',
			'value'=>$model->niveau->nom,
		),
	),
)); ?>
