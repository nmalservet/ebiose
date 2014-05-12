<?php
/**
 * CDetailGridViewWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @linkId http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * PREREQUIS : detailGridView.css
 */



class CDetailGridViewWidget extends CWidget
{
	/**
	 * Donnée
	 * @var CDataProvider
	 */
	public $data;

	/**
	 * si est setter faire un lien vers l'objet, contient le nom du champ de la clé primaire
	 * @var String
	 */
	public $linkId;
	
	/**
	 * Contient le nom de l'attribut ou le lien doit etre fait
	 * @var String
	 */
	public $linkAttribute;
	
	/**
	 * Contient le nom de l'action si il y a un lien
	 * @var String
	 */
	public $action;
	
	/**
	 * Model des données
	 * @var CModel
	 */
	public $model;
	
	/**
	 * attribue des models
	 * @var Array
	 */
	public $attributes;

	public function init()
	{
		parent::init();
	}
	
	public function getClass($i)
	{
		return $i==0 ? "class=\"odd\"" : "class=\"even\"";
	}
	
	/**
	 * 
	 */
	public function run()
	{
		if(isset($this->data) && isset($this->model) && isset($this->attributes))
		{
			$arrayData=$this->data->getData();
			$arrayAttribute=$this->attributes;
			$arrayLabel=$this->model->attributeLabels();
			$i=1;
			if(count($arrayData)>0)
			{
				echo "<table class=\"detail-view\"><tr class=\"odd\">";
				foreach($arrayAttribute as $attribut)
				{
					echo "<th style=\"text-align:center;\">".$arrayLabel[$attribut]."</th>";
				}
				echo "</tr>";
				foreach($arrayData as $model)
				{
					$model = is_array($model)? $model[0] : $model;
					echo "<tr ".$this->getClass($i).">";
					foreach($arrayAttribute as $attribut)
					{
						if(isset($this->linkId) && isset($this->action) && isset($this->linkAttribute))
						{
							$linkId = $this->linkId;
							$attribut==$this->linkAttribute ? $valeur=CHtml::link($model->$attribut,array($this->action,'id'=>$model->$linkId)) : $valeur=$model->$attribut;
							echo '<td style="text-align:center;">'.$valeur."</td>";
						}
						else
						{
							echo '<td style="text-align:center;">'.$model->$attribut."</td>";
						}
					}
					echo "</tr>";
					$i==0 ? $i=1 : $i=0;
				}
				echo '</table>';
			}
		}
		
	}
}