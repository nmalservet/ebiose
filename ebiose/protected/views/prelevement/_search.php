<?php
/* @var $this PrelevementController */
/* @var $model Prelevement */
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
		<?php echo $form->label($model,'identifier'); ?>
		<?php echo $form->textField($model,'identifier',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'patient_id'); ?>
		<?php echo $form->textField($model,'patient_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_prelevement_id'); ?>
		<?php echo $form->textField($model,'type_prelevement_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_provenance_id'); ?>
		<?php echo $form->textField($model,'site_provenance_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_creation'); ?>
		<?php echo $form->textField($model,'date_creation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_prelevement'); ?>
		<?php echo $form->textField($model,'date_prelevement'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_arrivee'); ?>
		<?php echo $form->textField($model,'date_arrivee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'transport_step_id'); ?>
		<?php echo $form->textField($model,'transport_step_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->