<?php
/* @var $this NonConformiteController */
/* @var $model NonConformite */

?>

<h1><?php echo Yii::t('common','update_non_conformite')." ".$model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'listNiveauImportance'=>$listNiveauImportance)); ?>