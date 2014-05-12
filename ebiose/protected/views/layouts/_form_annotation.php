<?php
/* @var $this PatientController */
/* @var $form CActiveForm */
/* @var $model ListResultatAnnotationForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'annotation-form',
	'enableAjaxValidation'=>false,
)); ?>
<table>
<?php 
//génération des champs dynamique
	$i=0;
	$isNewRecord=true;
	foreach($model->listResultatAnnotation as $resultat)
	{
		//si un seul des champs est deja en base ce n'est pas un new record
		if(!$model->listResultatAnnotation[$i]->isNewRecord)
		{
			$isNewRecord=false;
		}
		echo "<tr>";
		echo "<td>".CHTML::label($model->listResultatAnnotation[$i]->annotation->nom,'listResultatAnnotation_'.$model->listResultatAnnotation[$i]->annotation_id)."</td>";
		$annotation=$resultat->annotation;
		switch($annotation->type_annotation)
		{
			case Constants::ANNOTATION_TEXT:
				echo "<td>".CHTML::textField('listResultatAnnotation['.$model->listResultatAnnotation[$i]->annotation_id.']',$model->listResultatAnnotation[$i]->valeur,array('size'=>20))."</td>";
				break;
			/*
			case Constants::ANNOTATION_TEXTAREA:
			{
				echo "<td>".CHTML::textArea('listResultatAnnotation['.$i.']',$model->listResultatAnnotation[$i]->valeur)."</td>";
				break;
			}
			case Constants::ANNOTATION_SELECT_LIST:
			{
				echo "<td>".CHTML::dropDownList($model'listResultatAnnotation['.$i.']',$model->listResultatAnnotation[$i]->valeur[0],$model->listResultatAnnotation[$i]->valeur)."</td>";
				break;
			}
			case Constants::ANNOTATION_CHECKBOX:
			{
				echo "<td>".CHTML::checkBox($model'listResultatAnnotation['.$i.']',$model->listResultatAnnotation[$i]->valeur)."</td>";
				break;
			}
			 */
		}
		echo "</tr>";
		$i++;
	}
?>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->