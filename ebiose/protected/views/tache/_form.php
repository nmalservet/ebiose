<?php
/* @var $this TacheController */
/* @var $model Tache */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tache-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires. </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_limite'); ?>
		 <?php echo CHtml::activeTextField($model,'date_limite',array('size'=>10,"id"=>"date_limite")); ?>
	    <?php $this->widget('application.extensions.calendar.SCalendar',
	        array(
	        'inputField'=>'date_limite',
	       'ifFormat'=>'%H:%M %Y-%m-%d',
	        'showsTime'=>true,
	        'range'=>"[1880,2025]"
	    ));
	    ?>
		<?php echo $form->error($model,'date_limite'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->