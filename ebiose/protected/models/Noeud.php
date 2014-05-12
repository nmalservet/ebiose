<?php
class Noeud
{
	public $id;
	public $nom;
	public $description;
	public $listFils = array();
	
	public function Noeud($leDossier) 
	{
		if(isset($leDossier))
		{
			$this->id = $leDossier->id;
			$this->nom = $leDossier->nom;
			$this->description = $leDossier->description;
		}
		else
		{
			$this->id = 0;
		}
	}
}
?>