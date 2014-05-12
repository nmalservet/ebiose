<?php
/* @var $this ConteneurController */
/* @var $model Conteneur */
/* @var $noeud Noeud */

$this->breadcrumbs=array(
	'Conteneurs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Conteneur', 'url'=>array('index')),
	array('label'=>'Create Conteneur', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('conteneur-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1><?php echo Yii::t('common','admin_conteneur')?></h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'conteneur','labelAdd'=>Yii::t('common','ajouter_conteneur'))); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br>
<?php $this->widget('application.widgets.conteneur.CTreeViewWidget', array(
		'noeud'=>$noeud,
)); ?>
<br>
<?php echo CHtml::link(Yii::t('common','conteneur_placer_echantillon'),array('conteneur/placer')); ?><br>
<?php echo CHtml::link(Yii::t('common','update_conteneur'),array('conteneur/chose','action'=>'update')); ?><br>
<?php echo CHtml::link(Yii::t('common','delete_conteneur'),array('conteneur/chose','action'=>'delete')); ?><br>
