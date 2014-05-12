<?php
/* @var $this TacheController */
/* @var $model Tache */
/* @var $listeUser Liste des user ou il n'y a pas ceux assigné a la tache */

$this->breadcrumbs=array(
	'Taches'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tache', 'url'=>array('index')),
	array('label'=>'Create Tache', 'url'=>array('create')),
	array('label'=>'Update Tache', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tache', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tache', 'url'=>array('admin')),
);
?>

<h1>View Tache <?php echo $model->nom; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
		'date_limite',
		'date_creation',
	),
)); ?>


<br>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'tache-form',
	'action' => $this->createUrl('tache/removeUser&id='.$model->id))
); ?>

Utilisateur assigné :
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-tache-grid',
	'dataProvider'=> new CArrayDataProvider($model->users, array('keyField'=>'id','pagination'=>array('pageSize'=>5,),)),
	'columns'=>array(
		array(
			'name'=>'nom',
			'type'=>'html',
			'value'=>'$data->getNomPrenom()',
		),
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
    'id'=>'tache-form',
	'action' => $this->createUrl('tache/addUser&id='.$model->id))
); ?>
<td align="left"><?php echo CHtml::imageButton(Constants::PATH_IMAGE.'tick.png',array('id'=>'add')); ?></td>
<br>
	</tr>
</table>
Liste des utilisateurs :
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-autre-grid',
	'dataProvider'=> new CArrayDataProvider($listeUser, array('keyField'=>'id','pagination'=>array('pageSize'=>5,),)),
	'columns'=>array(
		array(
			'name'=>'nom',
			'type'=>'html',
			'value'=>'$data->getNomPrenom()',
		),
		array(
			'class'=>'CCheckBoxColumn',
			//permet la selection multiple
			'selectableRows'=>2,
		),
	),
)); ?>
<?php $this->endWidget(); ?>

