<?php
/* @var $this PatientController */
/* @var $model Patient */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patient-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont obligatoires. </p>

	<?php $styleTextField = 'margin-left:3px;margin-right:10px;';?>
	<?php echo $form->errorSummary($model); ?>
	<table>
		<tr>
			<td><?php echo $form->labelEx($model,'ipp'); ?></td>
			<td><?php echo $form->textField($model,'ipp',array('size'=>8,'maxlength'=>45)); ?></td>
			
			<td><?php echo $form->labelEx($model,'nom_usuel'); ?></td>
			<td><?php echo $form->textField($model,'nom_usuel',array('size'=>8,'maxlength'=>45)); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'ipp'); ?></td>
			<td colspan=2><?php echo $form->error($model,'nom_usuel'); ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'nom_naissance'); ?></td>
			<td><?php echo $form->textField($model,'nom_naissance',array('size'=>8,'maxlength'=>45)); ?></td>
			
			<td><?php echo $form->labelEx($model,'date_naissance'); ?></td>
			<td><?php echo CHtml::activeTextField($model,'date_naissance',array('size'=>8,"id"=>"date_naissance")); ?>
		    <?php $this->widget('application.extensions.calendar.SCalendar',
		        array(
		        'inputField'=>'date_naissance',
		       'ifFormat'=>'%Y-%m-%d',
		        'showsTime'=>false,
		        'range'=>"[1880,2025]"
		    ));
		    ?></td>
			
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'nom_naissance'); ?></td>
			<td colspan=2><?php echo $form->error($model,'date_naissance'); ?></td>
		</tr>
		<tr>	
			<td><?php echo $form->labelEx($model,'sexe'); ?></td>
			<td><?php echo $form->dropDownList($model,'sexe',Constants::getSexeOption(),array('style'=>'width:125px;')); ?></td>
			<td><?php echo $form->labelEx($model,'prenom'); ?></td>
			<td><?php echo $form->textField($model,'prenom',array('size'=>8,'maxlength'=>45)); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'prenom'); ?></td>
			<td colspan=2><?php echo $form->error($model,'sexe'); ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'est_decede'); ?></td>
			<td><?php echo $form->checkBox($model,'est_decede',array('onclick'=>'enableDeces(this.checked)')); ?></td>
			<?php 
				$styleDeces ="";
				if(isset($model->est_decede))
				{
					if(!$model->est_decede)
						$styleDeces="disabled";
				}
				else
					$styleDeces="disabled";
			?>
			<td><?php echo $form->labelEx($model,'date_deces'); ?></td>
			<td><?php echo CHtml::activeTextField($model,'date_deces',array('size'=>8,"id"=>"date_deces",'disabled'=>$styleDeces)); ?>
		    <?php $this->widget('application.extensions.calendar.SCalendar',
		        array(
		        'inputField'=>'date_deces',
		       'ifFormat'=>'%Y-%m-%d',
		        'showsTime'=>false,
		        'range'=>"[1880,2025]"
		    ));
		    ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'est_decede'); ?></td>
			<td colspan=2><?php echo $form->error($model,'date_deces'); ?></td>
		</tr>
		<tr>
			<td colspan=4><?php echo CHtml::label( Yii::t('common',"coord_hopi_naiss"),"coordonnee_hospital"); ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'adresse_naissance'); ?></td>
			<td><?php echo $form->textField($model,'adresse_naissance',array('size'=>8,'maxlength'=>100)); ?></td>
			<td><?php echo $form->labelEx($model,'ville_naissance'); ?></td>
			<td><?php echo $form->textField($model,'ville_naissance',array('size'=>8,'maxlength'=>100)); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'adresse_naissance'); ?></td>
			<td colspan=2><?php echo $form->error($model,'ville_naissance'); ?></td>
		</tr>
		<tr>
			<td><?php echo $form->labelEx($model,'cp_naissance'); ?></td>
			<td><?php echo $form->textField($model,'cp_naissance',array('size'=>8,'maxlength'=>10)); ?></td>
			<td><?php echo $form->labelEx($model,'pays_naissance'); ?></td>
			<td><?php echo $form->textField($model,'pays_naissance',array('size'=>8,'maxlength'=>2)); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'cp_naissance'); ?></td>
			<td colspan=2><?php echo $form->error($model,'pays_naissance'); ?></td>
		</tr>
	</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->