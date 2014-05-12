<?php
/* @var $this NonConformiteController */
/* @var $model NonConformite */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'non-conformite-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>20,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_debut_nc'); ?>
		<?php echo CHtml::activeTextField($model,'date_debut_nc',array('size'=>20,"id"=>"date_debut_nc")); ?>
	    <?php $this->widget('application.extensions.calendar.SCalendar',
		        array(
		        'inputField'=>'date_debut_nc',
		       'ifFormat'=>'%Y-%m-%d',
		        'showsTime'=>false,
		        'range'=>"[1880,2025]"
		    ));
		?>
		<?php echo $form->error($model,'date_debut_nc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_fin_nc'); ?>
		<?php echo CHtml::activeTextField($model,'date_fin_nc',array('size'=>20,"id"=>"date_fin_nc")); ?>
	    <?php $this->widget('application.extensions.calendar.SCalendar',
		        array(
		        'inputField'=>'date_fin_nc',
		       'ifFormat'=>'%Y-%m-%d',
		        'showsTime'=>false,
		        'range'=>"[1880,2025]"
		    ));
		?>
		<?php echo $form->error($model,'date_fin_nc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>20,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'niveau_importance_id'); ?>
		<?php echo $form->dropDownList($model,'niveau_importance_id',$listNiveauImportance,array('style'=>'width:233px;')); ?>
		<?php echo $form->error($model,'niveau_importance_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->