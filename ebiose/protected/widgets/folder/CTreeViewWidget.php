<?php
/**
 * CTreeViewWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * PREREQUIS : la class Noeud
 */



class CTreeViewWidget extends CWidget
{
	/**
	 * Noeud mere de l'arborescence
	 * @var Noeud
	 */
	public $noeud;
	
	/**
	 * Formulaire conteneur du widget
	 * @var CActiveForm
	 */
	public $form;
	
	/**
	* Modele modele ou l'on doit setter l'attribut
	* @var unknown_type
	*/
	public $model;
	
	/**
	 * Nom de l'attribut. permet de setter la variable POST
	 * @var unknown_type
	 */
	public $attribut;

	public function init()
	{
		parent::init();
		
	}

	private function getImageBlanc()
	{
		return "<img  src=\"".Constants::PATH_IMAGE."treenode_blank.gif\" style=\"width: 18px; height: 18px; vertical-align: middle;display: inline;\" />";
	}
	
	private function getImageDossier()
	{
		return "<img  src=\"".Constants::PATH_IMAGE."folder.png\" style=\"width: 18px; height: 18px; vertical-align: middle;display: inline;\" />";
	}
	
	private function getImageMinus($id)
	{
		$display = $id[5] == '0' ? "inline" : "none";
		return "<img id=\"".$id."_im\" src=\"".Constants::PATH_IMAGE."treenode_expand_minus.gif\" style=\"width: 18px; height: 18px; vertical-align: middle;display: $display;\" />";
	}
	
	private function getImagePlus($id)
	{
		$display = $id[5] == '0' ? "none" : "inline";
		return "<img id=\"".$id."_ip\" src=\"".Constants::PATH_IMAGE."treenode_expand_plus.gif\" style=\"width: 18px; height: 18px; vertical-align: middle;display: $display;\" />";
	}
	
	private function affichNoeud($noeud, $level)
	{
		$res = "";
		$blanc = $this->makeBlanc($level);
		$res .= $this->makeLigneNoeud($noeud, $blanc);
		$display = $noeud->id == 0 ? "block" : "none";
		$res .= "<div id=\"noeud".$noeud->id."_f\" style=\"middle;display: $display;\">";
		foreach($noeud->listFils as $fils)
		{
			$res .= $this->affichNoeud($fils, $level+1);
		}
		$res .= "</div>";
		return $res."</span>";
	}
	
	private function makeBlanc($level)
	{
		$blanc = "";
		for($i = 0; $i < $level; $i++)
		{
			$blanc .= $this->getImageBlanc();
		}
		return $blanc;
	}
	
	private function makeLigneNoeud($noeud, $blanc)
	{
		$id = "noeud".$noeud->id;
		$res = "<span id=\"$id\" style=\"middle;display: block;\">".$blanc."<span id=\"".$id."_t\"><a onclick=\"toggleNoeud('".$id."')\">".$this->getImageMinus($id).$this->getImagePlus($id)."</a><a onclick=\"selectionNoeud('".$id."')\">".$this->getImageDossier()."</a>".$noeud->nom."</span>";
		return $res;
	}
	
	/**
	 * 
	 */
	public function run()
	{
		echo $this->affichNoeud($this->noeud, 0);
		echo $this->form->textField($this->model, $this->attribut, array('style'=>'display: none;','value'=>"",));
	}
}
