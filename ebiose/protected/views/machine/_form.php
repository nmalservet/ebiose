<?php
/* @var $this MachineController */
/* @var $model Machine */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'machine-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>
	<table height="200"><tr><td>
	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>20,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>5, 'cols'=>30,'size'=>30,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'couleur'); ?>
		<?php 
          $this->widget('ext.SMiniColors.SActiveColorPicker', array(
    'model' => $model,
    'attribute' => 'couleur',
    'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
    'options' => array(), // jQuery plugin options
    
));
             ?>
		<?php echo $form->error($model,'couleur'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>
	</td><td>
</td></tr></table>
	

<?php $this->endWidget(); ?>

</div><!-- form -->