<?php
/* @var $this EchantillonController */
/* @var $model echantillon */

$this->breadcrumbs=array(
	'Echantillons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List echantillon', 'url'=>array('index')),
	array('label'=>'Create echantillon', 'url'=>array('create')),
	array('label'=>'Update echantillon', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'delete echantillon', 'url'=>'#', 'linkoptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage echantillon', 'url'=>array('admin')),
);
?>

<h1>Echantillon <?php echo $model->identifier; ?></h1>

<p><?php echo CHtml::link(Yii::t('common','faire_echantillon_echantillon'),Yii::app()->createUrl('echantillon/create', array('idEchantillon' => $model->id)));?></p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
				'name'=>'type_id',
				'type'=>'html',
				'value'=>$model->getNomTypeEchantillon(),
		),
		array(
				'name'=>'site_provenance_id',
				'type'=>'html',
				'value'=>$model->getNomSiteProvenance(),
		),
		'identifier',
		'description',
		'quality',
		'quantity',
		'quantity_unity',
		array(
				'name'=>'parent_id',
				'type'=>'html',
				'value'=>$model->getNomParent(),
		),
		array(
				'name'=>'prelevement_id',
				'type'=>'html',
				'value'=>$model->getNomPrelevement(),
		),
		array(
				'name'=>'conteneur_id',
				'type'=>'html',
				'value'=>$model->getNomConteneur(),
		),
		'position',
	),
)); ?>

<br>
<h3><?php echo Yii::t('common','echantillon_echantillon'); ?></h3>
<?php $this->widget('application.widgets.view.CDetailGridViewWidget', array(
	'data'=>$dataProviderEchantillon,
	'model'=>Echantillon::model(),
	'linkId'=>'id',
	'linkAttribute'=>'identifier',
	'action'=>'echantillon/view',
	'attributes'=>array(
		'identifier',
		'description',
	),
)); ?>

<?php if($dataProviderEchantillon->getItemCount()==0) echo "<p>".Yii::t('common','no_echantillon_echantillon')."<p>";?>

<?php 	echo  "<br><h3>".Yii::t('common','echantillon_placer')."</h3>"; 
		$this->widget('application.widgets.conteneur.CTreeViewWidget', array(
				'noeud'=>$noeud,
				'isClickable'=>true,
				'echantillon_clickable'=>$model,
		));
?>
