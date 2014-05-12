<?php
/* @var $this ConteneurController */
/* @var $model Conteneur */

$this->breadcrumbs=array(
	'Conteneurs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Conteneur', 'url'=>array('index')),
	array('label'=>'Manage Conteneur', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','create_conteneur');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>