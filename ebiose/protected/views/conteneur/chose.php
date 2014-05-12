<?php 
/* @var $action String */
/* @var $listConteneur Array */
?>

<h1><?php echo Yii::t('common','chose_conteneur')?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Conteneur',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'conteneur'); ?>
		<?php echo $form->dropDownList($model,'conteneur',$listConteneur); ?>
		<?php echo $form->error($model,'conteneur'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('common','submit_chose')); ?>
	</div>

<?php $this->endWidget(); ?>

<?php echo CHtml::endForm();?>