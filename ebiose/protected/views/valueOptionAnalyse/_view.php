<?php
/* @var $this ValueOptionAnalyseController */
/* @var $data ValueOptionAnalyse */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_analyse')); ?>:</b>
	<?php echo CHtml::encode($data->id_analyse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valeur')); ?>:</b>
	<?php echo CHtml::encode($data->valeur); ?>
	<br />


</div>