<?php
/* @var $this FonctionUtilisateurController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fonction Utilisateurs',
);

$this->menu=array(
	array('label'=>'Create FonctionUtilisateur', 'url'=>array('create')),
	array('label'=>'Manage FonctionUtilisateur', 'url'=>array('admin')),
);
?>

<h1>Fonction Utilisateurs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
