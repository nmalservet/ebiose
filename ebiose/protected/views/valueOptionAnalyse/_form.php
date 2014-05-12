<?php
/* @var $this ValueOptionAnalyseController */
/* @var $model ValueOptionAnalyse */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'value-option-analyse-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_analyse'); ?>
		<?php echo $form->textField($model,'id_analyse'); ?>
		<?php echo $form->error($model,'id_analyse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valeur'); ?>
		<?php echo $form->textField($model,'valeur',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'valeur'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->