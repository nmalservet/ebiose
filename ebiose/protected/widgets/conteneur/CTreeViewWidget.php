<?php
/**
 * CTreeViewWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * PREREQUIS : la classe Noeud
 */



class CTreeViewWidget extends CWidget
{
	/**
	 * Noeud mere de l'arborescence
	 * @var Noeud
	 */
	public $noeud;
	
	/**
	 * Echantillon dont on est sur la vue (sert pour afficher une image differente)
	 * @var Echantillon
	 */
	public $echantillon_clickable;
	
	/**
	 * defini si le widget doit permetre a l'utilisateur de selectionner plusieur position dans les conteneurs.
	 * @var boolean
	 */
	public $isSelectable;
	
	/**
	 * defini si le widget doit permetre a l'utilisateur de cliquer sur une seul position dans les conteneurs.
	 * @var boolean
	 */
	public $isClickable;
	
	public function init()
	{
		parent::init();
		
	}

	private function getImageBlanc()
	{
		return "<img  src=\"".Constants::PATH_IMAGE."treenode_blank.gif\" style=\"width: 18px; height: 18px; vertical-align: middle;display: inline;\" />";
	}
	
	private function getImageConteneur()
	{
		//TODO retourner la bonne image
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
		$displayIdZero = $noeud->id == 0 ? "style=\"display: none;\"" : "style=\"vertical-align: center;\"";
		$boite = "";
		if($noeud->type_conteneur == 5)
			$boite = $this->makeBoite(Conteneur::model()->findByPk($noeud->id));
		$res = "<span id=\"$id\" style=\"vertical-align:middle;display: block; padding: 1px;\">".$blanc."<span id=\"".$id."_t\" $displayIdZero><a onclick=\"toggleNoeud('".$id."')\">".$this->getImageMinus($id).$this->getImagePlus($id).$this->getImageConteneur()."</a>".$noeud->nom.$boite."</span>";
		return $res;
	}
	
	/**
	 * 
	 */
	public function run()
	{
		if(!isset($this->isSelectable))
		{
			$this->isSelectable = false;
		}
		echo $this->affichNoeud($this->noeud, 0);
	}
	
	private function makeLinkEchantillon($echantillon)
	{
		return CHtml::link("<img src=\"".Constants::PATH_IMAGE."bullet_yellow.png\" >",array('echantillon/view','id'=>$echantillon->id));
	}	
	
	private function makeLinkEchantillonClickable($echantillon)
	{
		return CHtml::link("<img src=\"".Constants::PATH_IMAGE."bullet_red.png\" >",array('echantillon/view','id'=>$echantillon->id));
	}
	
	private function getEmpty()
	{
		return "<img src=\"".Constants::PATH_IMAGE."bullet_translucent.png\" >";
	}
	
	private function getEmptyClickable($position,$conteneur)
	{
		return CHtml::link("<img src=\"".Constants::PATH_IMAGE."bullet_translucent.png\" >",array('echantillon/placer','id'=>$this->echantillon_clickable->id,'position'=>$position,'idConteneur'=>$conteneur->id));
	}
	
	public function getEchantillonAtPosition($position, $list)
	{
		$rep = null;
		$trouv = false;
		$i = 0;
		while(!$trouv && $i < count($list))
		{
			$echantillon = $list[$i];
			if($echantillon->position == $position)
			{
				$rep=$echantillon;
				$trouv = true;
			}
			else
			{
				$i++;
			}
		}
		return $rep;
	}
	
	private function makeBoite($conteneur)
	{
		$res = "";
		if(isset($conteneur))
		{
			$listEchantillon = $conteneur->echantillons;
			$res .= "<div class=\"boite\" style=\"display: inline;\"><table style=\"display: inline;\">";
			$position =1;
			for($longueur = 0; $longueur < $conteneur->longueur; $longueur++)
			{
				$res .= "<tr>";
				for($largeur = 0; $largeur < $conteneur->largeur; $largeur++)
				{
					$echantillon = $this->getEchantillonAtPosition($position, $listEchantillon);
					$contenu = "";
					if($echantillon == null)
					{
						if($this->isClickable)
							$contenu=$this->getEmptyClickable($position,$conteneur);
						else if($this->isSelectable)
							$contenu = CHtml::checkBox("cbc".$conteneur->id."_".$position, false);
						else
							$contenu = $this->getEmpty();
					}
					else
					{
						if($this->isClickable)
						{
							if($echantillon->id == $this->echantillon_clickable->id)
								$contenu=$this->makeLinkEchantillonClickable($echantillon);
							else
								$contenu=$this->makeLinkEchantillon($echantillon);
						}
						else
							$contenu = $this->makeLinkEchantillon($echantillon);
					}
					$res .= "<td class=\"boite\">".$contenu."</td>";
					$position++;
				}
				$res .= "</tr>";
			}
			$res .= "</table></div>";
		}
		return $res;
	}
}
