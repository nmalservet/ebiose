<?php
/* @var $this SiteController */
/* @var $model Site */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'site-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>60,'maxlength'=>250, 'value'=>$model->nom)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250, 'value'=>$model->description)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adresse'); ?>
		<?php echo $form->textField($model,'adresse',array('size'=>60,'maxlength'=>200, 'value'=>$model->adresse)); ?>
		<?php echo $form->error($model,'adresse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ville'); ?>
		<?php echo $form->textField($model,'ville',array('size'=>50,'maxlength'=>50, 'value'=>$model->ville)); ?>
		<?php echo $form->error($model,'ville'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pays'); ?>
		<?php echo $form->textField($model,'pays',array('size'=>2,'maxlength'=>2, 'value'=>$model->pays)); ?>
		<?php echo $form->error($model,'pays'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code_postal'); ?>
		<?php echo $form->textField($model,'code_postal',array('size'=>10,'maxlength'=>10, 'value'=>$model->code_postal)); ?>
		<?php echo $form->error($model,'code_postal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'finess'); ?>
		<?php echo $form->textField($model,'finess',array('size'=>50,'maxlength'=>50, 'value'=>$model->finess)); ?>
		<?php echo $form->error($model,'finess'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->