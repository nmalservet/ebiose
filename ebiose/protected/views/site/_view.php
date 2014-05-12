<?php
/* @var $this SiteController */
/* @var $data Site */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresse')); ?>:</b>
	<?php echo CHtml::encode($data->adresse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ville')); ?>:</b>
	<?php echo CHtml::encode($data->ville); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pays')); ?>:</b>
	<?php echo CHtml::encode($data->pays); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code_postal')); ?>:</b>
	<?php echo CHtml::encode($data->code_postal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('finess')); ?>:</b>
	<?php echo CHtml::encode($data->finess); ?>
	<br />

	*/ ?>

</div>