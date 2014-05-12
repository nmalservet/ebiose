<?php
/* @var $this AnnotationController */
/* @var $data Annotation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_annotation')); ?>:</b>
	<?php echo CHtml::encode($data->getTypeAnnotationString()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_objet')); ?>:</b>
	<?php echo CHtml::encode($data->getTypeObjetString()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inactive')); ?>:</b>
	<?php echo CHtml::encode($data->getInactiveString()); ?>
	<br />


</div>