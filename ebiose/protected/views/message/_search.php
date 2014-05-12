<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */

$res = array();
//recuperation de la liste des auteurs
$modelsUser = User::model()->findAll();
//construction du tableau des auteurs
foreach ($modelsUser as $row)
{
	$res[$row["id"]] = $row["nom"].' '.$row["prenom"];
}
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->dateField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auteur'); ?>
		<?php echo $form->dropDownList($model,'auteur', $res); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sujet'); ?>
		<?php echo $form->textField($model,'sujet',array('size'=>30,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>2, 'cols'=>42)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lu'); ?>
		<?php echo $form->dropDownList($model,'lu', array(1=>'oui', 0=>'non')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->