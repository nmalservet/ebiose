<?php
/* @var $this PatientController */
/* @var $data Patient */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipp')); ?>:</b>
	<?php echo CHtml::encode($data->ipp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom_usuel')); ?>:</b>
	<?php echo CHtml::encode($data->nom_usuel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom_naissance')); ?>:</b>
	<?php echo CHtml::encode($data->nom_naissance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_naissance')); ?>:</b>
	<?php echo CHtml::encode($data->date_naissance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexe')); ?>:</b>
	<?php echo CHtml::encode($data->getSexeString()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prenom')); ?>:</b>
	<?php echo CHtml::encode($data->prenom); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_deces')); ?>:</b>
	<?php echo CHtml::encode($data->date_deces); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('est_decede')); ?>:</b>
	<?php echo CHtml::encode($data->est_decede); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresse_naissance')); ?>:</b>
	<?php echo CHtml::encode($data->adresse_naissance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ville_naissance')); ?>:</b>
	<?php echo CHtml::encode($data->ville_naissance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp_naissance')); ?>:</b>
	<?php echo CHtml::encode($data->cp_naissance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pays_naissance')); ?>:</b>
	<?php echo CHtml::encode($data->pays_naissance); ?>
	<br />

	*/ ?>

</div>