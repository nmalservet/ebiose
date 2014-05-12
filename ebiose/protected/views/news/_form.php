<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sujet'); ?>
		<?php echo $form->textField($model,'sujet',array('size'=>40,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'sujet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contenu'); ?>
		<?php echo $form->textArea($model,'contenu',array('rows'=>6, 'cols'=>82, 'maxlength'=>500)); ?>
		<?php echo $form->error($model,'contenu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->