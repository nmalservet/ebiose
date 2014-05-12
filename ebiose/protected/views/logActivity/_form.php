<?php
/* @var $this LogActivityController */
/* @var $model LogActivity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-activity-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action'); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'element_id'); ?>
		<?php echo $form->textField($model,'element_id'); ?>
		<?php echo $form->error($model,'element_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'table_id'); ?>
		<?php echo $form->textField($model,'table_id'); ?>
		<?php echo $form->error($model,'table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'field_id'); ?>
		<?php echo $form->textField($model,'field_id'); ?>
		<?php echo $form->error($model,'field_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'old_value'); ?>
		<?php echo $form->textField($model,'old_value',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'old_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_value'); ?>
		<?php echo $form->textField($model,'new_value',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'new_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_action'); ?>
		<?php echo $form->textField($model,'date_action'); ?>
		<?php echo $form->error($model,'date_action'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->