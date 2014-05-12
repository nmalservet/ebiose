<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->breadcrumbs=array(
	'Patients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Patient', 'url'=>array('index')),
	array('label'=>'Create Patient', 'url'=>array('create')),
	array('label'=>'Update Patient', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Patient', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Patient', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('common','view_patient').' : '.$model->ipp." ".$model->nom_usuel." ".$model->date_naissance; ?></h1>

<p><?php echo CHtml::link(Yii::t('common','faire_prelevement_patient'),Yii::app()->createUrl('prelevement/create', array('idPatient' => $model->id)));?></p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nom_naissance',
		array(
				'name'=>'sexe',
				'type'=>'html',
				'value'=>$model->getSexeString(),
		),
		'prenom',
		'date_deces',
		array(
				'name'=>'est_decede',
				'type'=>'html',
				'value'=>$model->getEstDecedeString(),
		),
		'adresse_naissance',
		'ville_naissance',
		'cp_naissance',
		'pays_naissance',
	),
)); ?>
<br>
<h3><?php echo Yii::t('common','annotation_patient'); ?></h3>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$dataProviderAnnotation,
	'attributes'=>$attribue,
)); ?>
<?php if($dataProviderAnnotation->getItemCount()==0) echo "<p>".Yii::t('common','no_annotation')."<p>";?>

<h3><?php echo Yii::t('common','echantillon_prelevement'); ?></h3>
<?php $this->widget('application.widgets.view.CDetailGridViewWidget', array(
	'data'=>$dataProviderPrelevement,
	'model'=>Prelevement::model(),
	'linkId'=>'id',
	'linkAttribute'=>'identifier',
	'action'=>'prelevement/view',
	'attributes'=>array(
		'identifier',
		'description',
	),
)); ?>
<?php if($dataProviderPrelevement->getItemCount()==0) echo "<p>".Yii::t('common','no_prelevement_patient')."<p>";?>
