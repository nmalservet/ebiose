<?php
/* @var $this EchantillonController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Echantillons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
