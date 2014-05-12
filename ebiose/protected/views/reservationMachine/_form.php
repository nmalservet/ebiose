<?php
/* @var $this ReservationMachineController */
/* @var $model ReservationMachine */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reservation-machine-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>
	
	

	<div class="row">
		<?php echo $form->labelEx($model,'machine_id'); ?>
		<?php
		$machine = new Machine; 
		echo $form->dropDownList($model, 'machine_id', $machine->getArrayMachines());
		?>
		<?php echo $form->error($model,'machine_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<input style="height:21px;" id="start_date" data-dojo-id="start_date" type="text" name="startDay" data-dojo-type="dijit/form/DateTextBox" required="true"
    onChange="endDay.constraints.min = arguments[0];" />
		<?php echo $form->error($model,'start_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'heure'); ?>
		<input name="startHour"  value="10:00" size="17px" />
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<input style="height:21px;" id="end_date" data-dojo-id="end_date" type="text" name="startDay" data-dojo-type="dijit/form/DateTextBox" required="true"
    onChange="endDay.constraints.min = arguments[0];" />
		<?php echo $form->error($model,'end_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'heure'); ?>
		<input name="endHour"  value="18:00" size="17px" />
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->