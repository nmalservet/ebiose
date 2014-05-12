<?php
/* @var $this ConteneurController */
/* @var $model Conteneur */

$this->breadcrumbs=array(
	'Conteneurs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Conteneur', 'url'=>array('index')),
	array('label'=>'Create Conteneur', 'url'=>array('create')),
	array('label'=>'View Conteneur', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Conteneur', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','update_conteneur')." ".$model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>