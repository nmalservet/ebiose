<?php
/* @var $this NonConformiteController */
/* @var $data NonConformite */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_creation')); ?>:</b>
	<?php echo CHtml::encode($data->date_creation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_debut_nc')); ?>:</b>
	<?php echo CHtml::encode($data->date_debut_nc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_fin_nc')); ?>:</b>
	<?php echo CHtml::encode($data->date_fin_nc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('niveau_importance_id')); ?>:</b>
	<?php echo CHtml::encode($data->niveau_importance_id); ?>
	<br />


</div>