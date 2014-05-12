<?php
/* @var $this AnnotationController */
/* @var $model Annotation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'annotation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires. </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>20,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>20,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_annotation'); ?>
		<?php echo $form->dropDownList($model,'type_annotation', Constants::getTypeAnnotationOption(), array('style'=>'width:233px;')); ?>
		<?php echo $form->error($model,'type_annotation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_objet'); ?>
		<?php echo $form->dropDownList($model,'type_objet', Constants::getTypeObjetAnnotationOption(), array('style'=>'width:233px;')); ?>
		<?php echo $form->error($model,'type_objet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inactive'); ?>
		<?php echo $form->dropDownList($model,'inactive',array(0=>'Non',1=>'Oui'), array('style'=>'width:233px;')); ?>
		<?php echo $form->error($model,'inactive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->