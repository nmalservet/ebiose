<?php
/* @var $this PrelevementController */
/* @var $data Prelevement */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identifier')); ?>:</b>
	<?php echo CHtml::encode($data->identifier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?>:</b>
	<?php echo CHtml::encode($data->patient_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_prelevement_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_prelevement_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_provenance_id')); ?>:</b>
	<?php echo CHtml::encode($data->site_provenance_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_creation')); ?>:</b>
	<?php echo CHtml::encode($data->date_creation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_prelevement')); ?>:</b>
	<?php echo CHtml::encode($data->date_prelevement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_arrivee')); ?>:</b>
	<?php echo CHtml::encode($data->date_arrivee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transport_step_id')); ?>:</b>
	<?php echo CHtml::encode($data->transport_step_id); ?>
	<br />

	*/ ?>

</div>