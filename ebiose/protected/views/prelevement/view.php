<?php
/* @var $this PrelevementController */
/* @var $model Prelevement */

$this->breadcrumbs=array(
	'Prelevements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Prelevement', 'url'=>array('index')),
	array('label'=>'Create Prelevement', 'url'=>array('create')),
	array('label'=>'Update Prelevement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Prelevement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prelevement', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','view_prelevement')." ".$model->identifier; ?></h1>

<p><?php echo CHtml::link(Yii::t('common','faire_echantillon_prelevement'),Yii::app()->createUrl('echantillon/create', array('idPrelevement' => $model->id)));?></p>

<?php $patient = $model->patient; 
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'patient_id',
			'type'=>'html',
			'value'=>$patient->ipp." ".$patient->date_naissance, 
		),
		array(
			'name'=>'type_prelevement_id',
			'type'=>'html',
			'value'=>isset($model->typePrelevement->nom) ? $model->typePrelevement->nom : "" ,
		),
		array(
			'name'=>'site_provenance_id',
			'type'=>'html',
			'value'=>isset($model->siteProvenance->nom) ? $model->siteProvenance->nom : "" ,
		),
		'description',
		'date_creation',
		'date_prelevement',
		'date_arrivee',
		'transport_step_id',
	),
)); ?>
<br>
<h3><?php echo Yii::t('common','echantillon_prelevement'); ?></h3>
<?php $this->widget('application.widgets.view.CDetailGridViewWidget', array(
	'data'=>$dataProviderEchantillon,	
	'model'=>Prelevement::model(),
	'linkId'=>'id',
	'linkAttribute'=>'identifier',
	'action'=>'echantillon/view',
	'attributes'=>array(
		'identifier',
		'description',
	),
)); ?>
<?php if($dataProviderEchantillon->getItemCount()==0) echo "<p>".Yii::t('common','no_echantillon_prelevement')."<p>";?>
