<?php
/* @var $this CatalogueController */
/* @var $model Catalogue */

$this->breadcrumbs=array(
	'Catalogues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Catalogue', 'url'=>array('index')),
	array('label'=>'Manage Catalogue', 'url'=>array('admin')),
);
?>

<h1>Créer un catalogue</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>