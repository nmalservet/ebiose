<?php
/* @var $this NonConformiteController */
/* @var $dataProvider CActiveDataProvider */

?>

<h1>Non Conformites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
