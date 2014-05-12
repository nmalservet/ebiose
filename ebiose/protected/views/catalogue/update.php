<?php
/* @var $this CatalogueController */
/* @var $model Catalogue */

$this->breadcrumbs=array(
	'Catalogues'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Catalogue', 'url'=>array('index')),
	array('label'=>'Create Catalogue', 'url'=>array('create')),
	array('label'=>'View Catalogue', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Catalogue', 'url'=>array('admin')),
);
?>

<h1>Modifier catalogue : <?php echo $model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>