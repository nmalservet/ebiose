<?php
/* @var $this MessageController */
/* @var $data Message */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reponse_id')); ?>:</b>
	<?php echo CHtml::encode($data->reponse_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auteur')); ?>:</b>
	<?php echo CHtml::encode($data->auteur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destinataire')); ?>:</b>
	<?php echo CHtml::encode($data->destinataire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sujet')); ?>:</b>
	<?php echo CHtml::encode($data->sujet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lu')); ?>:</b>
	<?php echo CHtml::encode($data->lu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trashed')); ?>:</b>
	<?php echo CHtml::encode($data->trashed); ?>
	<br />

	*/ ?>

</div>