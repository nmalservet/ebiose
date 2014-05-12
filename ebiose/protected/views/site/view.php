<?php
/* @var $this SiteController */
/* @var $model Site */
?>

<h1>Site : <?php echo $model->nom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
		array(
			'name'=>'adresse',
			'type'=>'html',
			'value'=>$model->adresse.", ".$model->ville,
		),
		'pays',
		'code_postal',
		'finess',
	),
)); ?>
