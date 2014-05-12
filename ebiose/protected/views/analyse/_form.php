<?php
/* @var $this AnalyseController */
/* @var $model Analyse */
/* @var $form CActiveForm */

$tabType_analyse = Constants::getTypeAnalyseOption();
$tabMachine = array();
$tabInactive = array('non','oui');
//recuperation des listes
$modelsMachine = Machine::model()->findAll();
//construction des tableau
foreach ($modelsMachine as $row)
{
	$tabMachine[$row["id"]] = $row["nom"];
}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'analyse-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_analyse'); ?>
		<?php echo $form->dropDownList($model,'type_analyse', $tabType_analyse); ?>
		<?php echo $form->error($model,'type_analyse'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'machine_id'); ?>
		<?php echo $form->dropDownList($model,'machine_id', $tabMachine); ?>
		<?php echo $form->error($model,'machine_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inactive'); ?>
		<?php echo $form->dropDownList($model,'inactive', $tabInactive); ?>
		<?php echo $form->error($model,'inactive'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->