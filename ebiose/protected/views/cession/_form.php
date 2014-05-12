<?php
/* @var $this CessionController */
/* @var $model Cession */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cession-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires. </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_id'); ?>
		<?php echo $form->textField($model,'contact_id'); ?>
		<?php echo $form->error($model,'contact_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_demande'); ?>
		<?php echo $form->textField($model,'date_demande'); ?>
		<?php echo $form->error($model,'date_demande'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transport_step_id'); ?>
		<?php echo $form->textField($model,'transport_step_id'); ?>
		<?php echo $form->error($model,'transport_step_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textField($model,'notes',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'statut_cession'); ?>
		<?php echo $form->textField($model,'statut_cession'); ?>
		<?php echo $form->error($model,'statut_cession'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'demande_cession_id'); ?>
		<?php echo $form->textField($model,'demande_cession_id'); ?>
		<?php echo $form->error($model,'demande_cession_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->