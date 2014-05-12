<?php
/* @var $this AnnotationController */
/* @var $model Annotation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>20,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>20,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_annotation'); ?>
		<?php echo $form->dropDownList($model,'type_annotation', Constants::getTypeAnnotationOption(), array('style'=>'width:233px;')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_objet'); ?>
		<?php echo $form->dropDownList($model,'type_objet', Constants::getTypeObjetAnnotationOption(), array('style'=>'width:233px;')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inactive'); ?>
		<?php echo $form->dropDownList($model,'inactive',array(0=>'Non',1=>'Oui'), array('style'=>'width:233px;')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('common','Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->