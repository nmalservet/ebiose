<?php
/* @var $this MachineController */
/* @var $model Machine */
?>

<h1>Mise à jour de machine : <?php echo $model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>