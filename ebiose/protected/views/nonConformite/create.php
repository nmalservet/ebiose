<?php
/* @var $this NonConformiteController */
/* @var $model NonConformite */

?>

<h1><?php echo Yii::t('common','create_non_conformite')?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'listNiveauImportance'=>$listNiveauImportance)); ?>