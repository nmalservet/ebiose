<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row">
		<?php echo $form->label($model,'sujet'); ?>
		<?php echo $form->textField($model,'sujet',array('size'=>40,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contenu'); ?>
		<?php echo $form->textField($model,'contenu',array('size'=>40,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->