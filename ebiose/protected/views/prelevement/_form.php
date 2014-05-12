<?php
/* @var $this PrelevementController */
/* @var $model Prelevement */
/* @var $form CActiveForm */
/* @var $listSite Array */
/* @var $listType Array */
/* @var $listPatient Array */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prelevement-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires. </p>

	<?php echo $form->errorSummary($model); ?>
	<table>
		<tr>
			<td><?php echo $form->labelEx($model,'identifier'); ?></td>
			<td><?php echo $form->textField($model,'identifier',array('size'=>20,'maxlength'=>250)); ?></td>
			<td><?php echo $form->labelEx($model,'patient_id'); ?></td>
			<td><?php echo $form->dropDownList($model,'patient_id',$listPatient,array('style'=>'width:233px;')); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'identifier'); ?><td>
			<td colspan=2><?php echo $form->error($model,'patient_id'); ?><td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'type_prelevement_id'); ?></td>
			<td><?php echo $form->dropDownList($model,'type_prelevement_id',$listType,array('style'=>'width:233px;')); ?></td>
			<td><?php echo $form->labelEx($model,'site_provenance_id'); ?></td>
			<td><?php echo $form->dropDownList($model,'site_provenance_id',$listSite,array('style'=>'width:233px;')); ?></td>
		</tr>
		<tr>
			<td colspan=4>
			</td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'description'); ?></td>
			<td><?php echo $form->textField($model,'description',array('size'=>20,'maxlength'=>250)); ?></td>
			<td><?php echo $form->labelEx($model,'date_prelevement'); ?></td>
			<td>
				<?php echo CHtml::activeTextField($model,'date_prelevement',array('size'=>20,"id"=>'date_prelevement','readonly'=>'readonly')); ?>
			    <?php $this->widget('application.extensions.calendar.SCalendar',
			        array(
			        'inputField'=>'date_prelevement',
			       	'ifFormat'=>'%Y-%m-%d %H:%M',
			        'showsTime'=>true,
			        'range'=>"[1880,2025]"
			    ));
			    ?>
			</td>
		</tr>
		<tr>
			<td colspan=4><?php echo $form->error($model,'description'); ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'date_arrivee'); ?></td>
			<td>
				<?php echo CHtml::activeTextField($model,'date_arrivee',array('size'=>20,"id"=>'date_arrivee','readonly'=>'readonly')); ?>
			    <?php $this->widget('application.extensions.calendar.SCalendar',
			        array(
			        'inputField'=>'date_arrivee',
			       'ifFormat'=>'%Y-%m-%d',
			        'showsTime'=>false,
			        'range'=>"[1880,2025]"
			    ));
			    ?>
			</td>
			<!-- <td><?php echo $form->labelEx($model,'transport_step_id'); ?></td>
			<td><?php echo $form->textField($model,'transport_step_id'); ?></td>-->
		</tr>
		<!-- <tr>
			<td colspan=4><?php echo $form->error($model,'transport_step_id'); ?></td>
		</tr>-->
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->