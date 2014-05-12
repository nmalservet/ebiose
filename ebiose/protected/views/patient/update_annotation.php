<?php
/* @var $this PatientController */
/* @var $model Patient */

?>

<h1><?php echo Yii::t('common','update_annotation_patient')." : ".$patient->ipp." ".$patient->nom_usuel." ".$patient->date_naissance;?></h1>
<?php echo $this->renderPartial('../layouts/_form_annotation', array('model'=>$model)); ?>