<?php
/* @var $this ValueOptionAnalyseController */
/* @var $model ValueOptionAnalyse */
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
		<?php echo $form->label($model,'id_analyse'); ?>
		<?php echo $form->textField($model,'id_analyse'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valeur'); ?>
		<?php echo $form->textField($model,'valeur',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->