<?php
/* @var $this AnalyseController */
/* @var $data Analyse */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_analyse')); ?>:</b>
	<?php echo CHtml::encode($data->type_analyse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('machine_id')); ?>:</b>
	<?php echo CHtml::encode($data->machine_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inactive')); ?>:</b>
	<?php echo CHtml::encode($data->inactive); ?>
	<br />


</div>