<?php
/* @var $this FonctionUtilisateurController */
/* @var $model FonctionUtilisateur */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('fonction-utilisateur-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des fonctions d'utilisateur</h1>

<?php  $this->widget('application.widgets.menu.CMenuModelLineWidget', array('modelName'=>'fonctionUtilisateur','labelAdd'=>'Ajouter une fonction utilisateur')); ?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fonction-utilisateur-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nom',
		'nom_en',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
