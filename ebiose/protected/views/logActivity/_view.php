<?php
/* @var $this LogActivityController */
/* @var $data LogActivity */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('element_id')); ?>:</b>
	<?php echo CHtml::encode($data->element_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('table_id')); ?>:</b>
	<?php echo CHtml::encode($data->table_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_id')); ?>:</b>
	<?php echo CHtml::encode($data->field_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('old_value')); ?>:</b>
	<?php echo CHtml::encode($data->old_value); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('new_value')); ?>:</b>
	<?php echo CHtml::encode($data->new_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_action')); ?>:</b>
	<?php echo CHtml::encode($data->date_action); ?>
	<br />

	*/ ?>

</div>