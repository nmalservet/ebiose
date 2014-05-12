<?php
/* @var $this CatalogueController */
/* @var $model Catalogue */
/* @var $listeEchantillon Liste des echantillon ou il n'y a pas ceux du catalogue */

$this->breadcrumbs=array(
	'Catalogues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Catalogue', 'url'=>array('index')),
	array('label'=>'Create Catalogue', 'url'=>array('create')),
	array('label'=>'Update Catalogue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Catalogue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Catalogue', 'url'=>array('admin')),
);
?>

<h1>Catalogue : <?php echo $model->nom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
	),
)); ?>
<br>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'remove-catalogue-form',
	'action' => $this->createUrl('catalogue/removeEchantillon&id='.$model->id))
); ?>

Echantillons du catalogue :
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'echantillon-catalogue-grid',
	'dataProvider'=> new CArrayDataProvider($model->echantillons, array('keyField'=>'id','pagination'=>array('pageSize'=>5,),)),
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

<table>
  <tr>
<td align="right"><?php echo CHtml::imageButton(Constants::PATH_IMAGE.'delete.png',array('id'=>'remove')); ?></td>
<?php $this->endWidget(); ?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'add-catalogue-form',
	'action' => $this->createUrl('catalogue/addEchantillon&id='.$model->id))
); ?>
<td align="left"><?php echo CHtml::imageButton(Constants::PATH_IMAGE.'tick.png',array('id'=>'add')); ?></td>
<br>
	</tr>
</table>
Liste des autres echantillon :
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'echantillon-autre-grid',
	'dataProvider'=> new CArrayDataProvider($listeEchantillon, array('keyField'=>'id','pagination'=>array('pageSize'=>5,),)),
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
			//permet la selection multiple
			'selectableRows'=>2,
		),
	),
)); ?>
<?php $this->endWidget(); ?>
