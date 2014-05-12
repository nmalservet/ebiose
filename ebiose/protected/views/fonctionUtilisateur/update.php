<?php
/* @var $this FonctionUtilisateurController */
/* @var $model FonctionUtilisateur */

?>

<h1>Mise à jour une fonction utilisateur <?php echo $model->nom; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>