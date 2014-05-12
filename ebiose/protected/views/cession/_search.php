<?php
/* @var $this CessionController */
/* @var $model Cession */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact_id'); ?>
		<?php echo $form->textField($model,'contact_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_demande'); ?>
		<?php echo $form->textField($model,'date_demande'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transport_step_id'); ?>
		<?php echo $form->textField($model,'transport_step_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textField($model,'notes',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'statut_cession'); ?>
		<?php echo $form->textField($model,'statut_cession'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'demande_cession_id'); ?>
		<?php echo $form->textField($model,'demande_cession_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->