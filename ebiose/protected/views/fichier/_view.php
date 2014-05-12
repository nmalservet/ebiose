<?php
/* @var $this FichierController */
/* @var $data Fichier */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('suffixe')); ?>:</b>
	<?php echo CHtml::encode($data->suffixe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dossier_id')); ?>:</b>
	<?php echo CHtml::encode($data->dossier_id); ?>
	<br />


</div>