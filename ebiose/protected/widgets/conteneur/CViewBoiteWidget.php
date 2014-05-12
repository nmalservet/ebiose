<?php
/**
 * CTreeViewWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * PREREQUIS :
 */

class CViewBoiteWidget extends CWidget
{
	/**
	 * boite à afficher
	 * @var Conteneur
	 */
	public $boite;
	
	public function init()
	{
		parent::init();
	}
	
	public function run()
	{
		if(isset($this->boite))
		{
			$listEchantillon = $this->boite->echantillons;
			echo "<table style=\"display: inline; border:1px solid black; \"><tr>";
				foreach($listEchantillon as $echantillon)
				{
					echo "<td>$echantillon->identifier</td>";
				}
			echo "</tr></table>";
			//afficher tableau
		}
	}
}
?>