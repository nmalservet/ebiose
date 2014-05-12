<?php 
/**
 * classe de constantes gloables pour studionline (SOL).
 */
class Constants
{
	//constante contenant le chemin ou se trouve les images
	const PATH_IMAGE="./images/";
	 
	/*
	 * VOLUME : declinaisons du litre
	*/
	const VOLUME_LITRE =1;
	const VOLUME_DECILITRE = 2;
	const VOLUME_CENTILITRE = 3;
	const VOLUME_MILLILITRE = 4;
	const VOLUME_MICROLITRE = 5;

	public function getVolumeOption(){
		return array(
				Constants::VOLUME_LITRE=>'l',
				Constants::VOLUME_DECILITRE=>'dl',
				Constants::VOLUME_CENTILITRE=>'cl',
				Constants::VOLUME_MILLILITRE=>'ml',
				Constants::VOLUME_MICROLITRE=>'µl',
		);
	}
	 
	/**
	 * TYPE D'ANALYSE
	 */
	const TYPE_ANALYSE_LISTBOX = 1;
	const TYPE_ANALYSE_TEXTBOX = 2;
	const TYPE_ANALYSE_TEXTAREA = 3;
	const TYPE_ANALYSE_CHECKBOX = 4;
	const TYPE_ANALYSE_FILEINPUT = 5;
	 
	public function getTypeAnalyseOption(){
		return array(
				Constants::TYPE_ANALYSE_LISTBOX=>'liste déroulante',
				Constants::TYPE_ANALYSE_TEXTBOX=>'court texte',
				Constants::TYPE_ANALYSE_TEXTAREA=>'long texte',
				Constants::TYPE_ANALYSE_CHECKBOX=>'case à cocher',
				Constants::TYPE_ANALYSE_FILEINPUT=>'fichier',
		);
	}
	 
	/**
	 * SEXE
	 */
	const SEXE_INCONNU = 0;
	const SEXE_MASCULIN = 1;
	const SEXE_FEMININ = 2;
	
	public function getSexeOption(){
		return array(
				Constants::SEXE_INCONNU=>'Inconnu',
				Constants::SEXE_MASCULIN=>'Masculin',
				Constants::SEXE_FEMININ=>'Feminin',
		);
	}
	
	/**
	 * TYPE D'OBJET D'ANNOTATION
	 */
	const ANNOTATION_PATIENT = 0;
	const ANNOTATION_PRELEVEMENT = 1;
	const ANNOTATION_PRODUIT = 2;
	const ANNOTATION_CESSION = 3;
	const ANNOTATION_ECHANTILLON = 4;
	
	public function getTypeObjetAnnotationOption(){
		return array(
				Constants::ANNOTATION_PATIENT=>'Patient',
				Constants::ANNOTATION_PRELEVEMENT=>'Prélévement',
				Constants::ANNOTATION_PRODUIT=>'Produit',
				Constants::ANNOTATION_CESSION=>'Cession',
				Constants::ANNOTATION_ECHANTILLON=>'echantillon',
		);
	}
	
	/**
	 * TYPE D'ANNOTATION
	 */
	const ANNOTATION_TEXT = 0;
	const ANNOTATION_TEXTAREA = 1;
	const ANNOTATION_SELECT_LIST = 2;
	const ANNOTATION_CHECKBOX = 3;
	const ANNOTATION_RADIO = 4;
	
	public function getTypeAnnotationOption(){
		return array(
				Constants::ANNOTATION_TEXT=>'Text court',
		);
	}
	
	const FORMAT_DATE = 'Y-m-d H:i:s';
}
?>