<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */

	
	$res = array();
	if(isset($_GET["destinataire"]))
	{// reponse à un message
		//recuperation du model corespondant a l'id
		$modelUser = User::model()->findbyPk($_GET["destinataire"]);
		//construction du tableau des destinataire
		$res[$modelUser->id] = $modelUser->nom.' '.$modelUser->prenom;
	}
	else 
	{//si ce n'est pas une reponse a un message
		//recuperation de la liste des destinataires
		$modelsUser = User::model()->findAll();
		//construction du tableau des destinataire
		foreach ($modelsUser as $row)
		{
			$res[$row["id"]] = $row["nom"].' '.$row["prenom"];
		}
	}
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?> </p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
	    <?php echo $form->labelEx($model,'destinataire'); ?>
	    <?php echo $form->dropDownList($model,'destinataire', $res); ?>
	    <?php echo $form->error($model,'destinataire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sujet'); ?>
		<?php echo $form->textField($model,'sujet',array('size'=>35,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'sujet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Envoyer' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->