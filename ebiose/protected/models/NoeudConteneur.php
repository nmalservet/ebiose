<?php
class NoeudConteneur extends Noeud
{
	public $id;
	public $nom;
	public $description;
	public $type_conteneur;
	public $listFils = array();
	
	public function NoeudConteneur($leConteneur) 
	{
		if(isset($leConteneur))
		{
			parent::__construct($leConteneur); 
			$this->type_conteneur = $leConteneur->type_conteneur;
		}
		else
		{
			$this->id = 0;
		}
	}
}
?>