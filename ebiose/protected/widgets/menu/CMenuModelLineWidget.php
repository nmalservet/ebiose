<?php
/**
 * CMenuModelLineWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * affichage de la ligne de menu pour un model ( exemple, patient, affiche ajouter patient, recherche avancée, aide contextuelle, print, export pdf, xls, csv)
 */



class CMenuModelLineWidget extends CWidget
{
	/**
	 * nom du model utilisé, exemple, patient, user etc.
	 * @var unknown_type
	 */
	public $modelName;
	
	/**
	 * label utilisé pour la ligne "ajouter un objet", comme ajouter un patient.<br>
	 * Si vide alors reconstruction en français.
	 */
	public $labelAdd;

	/**
	 * affichage de la ligne de menu.
	 */
	public function run()
	{
		$labelAjouterModel="Ajouter";
		if(!isset($this->labelAdd)){
			$labelAjouterModel.= " ".$this->modelName;
		}else{
			$labelAjouterModel=$this->labelAdd;
		}
		echo "<div style=\"background:#EFFDFF;margin:5px;padding-right: 10px;\">";
		$image = CHtml::image('./images/add.png', $labelAjouterModel);
		echo "<span style=\"padding-right: 10px;\">".CHtml::link($image.$labelAjouterModel,array($this->modelName.'/create'))."</span>";
		$imagesearch = CHtml::image('./images/zoom.png', 'Recherche avancée');
		echo CHtml::link($imagesearch.'Recherche avancée','#',array('class'=>'search-button'));
		echo "<a   style=\"margin: 0px 0px 0px 5px;\" onclick=\"toggleHelp('help-advanced-search')\">";
		echo CHtml::image(Yii::app()->request->baseUrl.'/images/help.png');
		echo "</a>";
		echo "<div style=\"display:inline;float:right;\">";
		$imageprinter = CHtml::image('./images/printer.png', 'Liste imprimable');
		echo "<span>".CHtml::link($imageprinter,array($this->modelName.'/index'))."</span>";
		$imageexportpdf = CHtml::image('./images/page_white_acrobat.png', 'Liste format pdf');
		echo "<span style=\"padding-left: 10px;\">".CHtml::link($imageexportpdf,array($this->modelName.'/exportPdf'))."</span>";
		$imageexport = CHtml::image('./images/page_white_csv.png', 'Liste format csv');
		echo "<span style=\"padding-left: 10px;\">".CHtml::link($imageexport,array($this->modelName.'/exportCsv'))."</span>";
		$imageexportxls = CHtml::image('./images/page_white_excel.png', 'Liste format excel');
		echo "<span style=\"padding-left: 10px;\">".CHtml::link($imageexportxls,array($this->modelName.'/exportXls'))."</span>";
		echo "</div>";
		echo "</div>
		<!-- div aide advanced search -->
		<div id=\"help-advanced-search\" style=\"display:none\" class=\"help-box\">
		<p>
		Vous pouvez saisir en option un opérateur de comparaison (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
		or <b>=</b>) au début de chaque valeur de recherche pour spécifier comment la comparaison doit être effectuée.
		</p>
		</div>";
	}
}