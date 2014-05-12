<?php
/* @var $this ConteneurController */
/* @var $model Conteneur */
/* @var $noeud Noeud */ 
/* @var $listEchantillon */

?>
<h1><?php echo Yii::t('common','placer_echantillon'); ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'echantillon-form',
	'action' => $this->createUrl('conteneur/addEchantillons')
)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'echantillon-grid',
	'dataProvider'=> new CArrayDataProvider($listEchantillon, array('keyField'=>'id','pagination'=>array('pageSize'=>5,),)),
	'columns'=>array(
		'id',
		//'type_id',
		'site_provenance_id',
		'identifier',
		'description',
		'quality',
		'quantity',
		'quantity_unity',
		'parent_id',
		'conteneur_id',
		'position',
		array(
				'class'=>'CCheckBoxColumn',
				'selectableRows'=>2,
		),
	),
)); ?>

<?php 
$this->widget('application.widgets.conteneur.CTreeViewWidget', array(
		'noeud'=>$noeud,
		'isSelectable'=>true,
)); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('common','placer')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
