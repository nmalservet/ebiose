<?php
/* @var $this EchantillonController */
/* @var $model echantillon */
/* @var $form CActiveForm */
	$tabSite = array();
	$tabType = array();
	$tabConteneur = array();
	$tabPrelevement = array();
	//recuperation des listes
	$modelsSite = Site::model()->findAll();
	$modelsType = TypeEchantillon::model()->findAll();
	$modelsConteneur = Conteneur::model()->findAll();
	$modelsPrelevement = Prelevement::model()->findAll();
	//construction des tableau
	foreach ($modelsSite as $row)
	{
		$tabSite[$row["id"]] = $row["nom"];
	}
	foreach ($modelsType as $row)
	{
		$tabType[$row["id"]] = $row["nom"];
	}
	foreach ($modelsConteneur as $row)
	{
		$tabConteneur[$row["id"]] = $row["nom"];
	}
	foreach ($modelsPrelevement as $row)
	{
		$tabPrelevement[$row["id"]] = $row["identifier"];
	}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'echantillon-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>

	<table>
		<tr>
			<td><?php echo $form->labelEx($model,'type_id'); ?></td>
			<td><?php echo $form->dropDownList($model,'type_id',$tabType,array('style'=>'width:233px;')); ?></td>
			<td><?php echo $form->labelEx($model,'site_provenance_id'); ?></td>
			<td><?php echo $form->dropDownList($model,'site_provenance_id', $tabSite,array('style'=>'width:233px;')); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'type_id'); ?></td>
			<td colspan=2><?php echo $form->error($model,'site_provenance_id'); ?></td>
		<tr>
		<tr>
			<td><?php echo $form->labelEx($model,'identifier'); ?></td>
			<td><?php echo $form->textField($model,'identifier',array('size'=>20,'maxlength'=>250)); ?></td>
			<td><?php echo $form->labelEx($model,'description'); ?></td>
			<td><?php echo $form->textField($model,'description',array('size'=>20,'maxlength'=>250)); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'identifier'); ?></td>
			<td colspan=2><?php echo $form->error($model,'description'); ?></td>
		<tr>
		<tr>
			<td><?php echo $form->labelEx($model,'quality'); ?></td>
			<td><?php echo $form->textField($model,'quality',array('size'=>20)); ?></td>
			<td><?php echo $form->labelEx($model,'volume'); ?></td>
			<td><?php echo $form->textField($model,'volume',array('size'=>5)); ?><?php echo $form->dropDownList($model, 'volume_unity',  Constants::getVolumeOption())?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'quality'); ?></td>
			<td colspan=2><?php echo $form->error($model,'volume'); ?><?php echo $form->error($model,'volume_unity'); ?></td>
		<tr>
		<tr>
			<td><?php echo $form->labelEx($model,'quantity'); ?></td>
			<td><?php echo $form->textField($model,'quantity',array('size'=>5)); ?><?php echo $form->dropDownList($model,'quantity_unity', QuantiteUnite::model()->getSelectList()); ?></td>
			<td><?php echo $form->labelEx($model,'prelevement_id'); ?></td>
			<td><?php echo $form->dropDownList($model,'prelevement_id', $tabPrelevement,array('style'=>'width:233px;')); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'quantity'); ?><?php echo $form->error($model,'quantity_unity'); ?></td>
			<td colspan=2><?php echo $form->error($model,'prelevement_id'); ?></td>
		<tr>
		<tr>
			<td><?php echo $form->labelEx($model,'conteneur_id'); ?></td>
			<td><?php echo $form->dropDownList($model,'conteneur_id',$tabConteneur,array('style'=>'width:233px;')); ?></td>
			<td><?php echo $form->labelEx($model,'position'); ?></td>
			<td><?php echo $form->textField($model,'position',array('size'=>20)); ?></td>
		</tr>
		<tr>
			<td colspan=2><?php echo $form->error($model,'conteneur_id'); ?></td>
			<td colspan=2><?php echo $form->error($model,'position'); ?></td>
		<tr>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save') ); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->