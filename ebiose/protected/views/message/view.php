<?php
/* @var $this MessageController */
/* @var $model Message */

	$model->lu = true;
	$model->save();
?>

<h1>Message de <?php echo $model->auteurM->nom." ".$model->auteurM->prenom." : ".$model->sujet; ?></h1>
<br>
<?php echo CHtml::link('Repondre',array('message/create','destinataire'=>$model->auteur)); ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'date',
		'message',
	),
)); ?>
