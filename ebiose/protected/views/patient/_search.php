<?php
/* @var $this PatientController */
/* @var $model Patient */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'ipp'); ?>
		<?php echo $form->textField($model,'ipp',array('size'=>20,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nom_usuel'); ?>
		<?php echo $form->textField($model,'nom_usuel',array('size'=>20,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nom_naissance'); ?>
		<?php echo $form->textField($model,'nom_naissance',array('size'=>20,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_naissance'); ?>
		<?php echo CHtml::activeTextField($model,'date_naissance',array('size'=>20,"id"=>"date_naissance")); ?>
		<?php $this->widget('application.extensions.calendar.SCalendar',
	        array(
	        'inputField'=>'date_naissance',
	       'ifFormat'=>'%Y-%m-%d',
	        'showsTime'=>false,
	        'range'=>"[1880,2025]"
	    ));
	    ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sexe'); ?>
		<?php echo $form->dropDownList($model,'sexe',Constants::getSexeOption(),array('style'=>"width:233px;")); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prenom'); ?>
		<?php echo $form->textField($model,'prenom',array('size'=>20,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_deces'); ?>
		<?php echo CHtml::activeTextField($model,'date_deces',array('size'=>20,"id"=>"date_deces")); ?>
		<?php $this->widget('application.extensions.calendar.SCalendar',
	        array(
	        'inputField'=>'date_deces',
	       'ifFormat'=>'%Y-%m-%d',
	        'showsTime'=>false,
	        'range'=>"[1880,2025]"
	    ));
	    ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'est_decede'); ?>
		<?php echo $form->checkBox($model,'est_decede'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adresse_naissance'); ?>
		<?php echo $form->textField($model,'adresse_naissance',array('size'=>20,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ville_naissance'); ?>
		<?php echo $form->textField($model,'ville_naissance',array('size'=>20,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp_naissance'); ?>
		<?php echo $form->textField($model,'cp_naissance',array('size'=>20,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pays_naissance'); ?>
		<?php echo $form->textField($model,'pays_naissance',array('size'=>20,'maxlength'=>2)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Rechercher'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->