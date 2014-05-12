<?php
/* @var $this CessionController */
/* @var $data Cession */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_id')); ?>:</b>
	<?php echo CHtml::encode($data->contact_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_demande')); ?>:</b>
	<?php echo CHtml::encode($data->date_demande); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transport_step_id')); ?>:</b>
	<?php echo CHtml::encode($data->transport_step_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('statut_cession')); ?>:</b>
	<?php echo CHtml::encode($data->statut_cession); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('demande_cession_id')); ?>:</b>
	<?php echo CHtml::encode($data->demande_cession_id); ?>
	<br />


</div>