<?php 
class ListResultatAnnotationForm extends CFormModel
{
	public $listResultatAnnotation=array();

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		$rep = array();
		foreach($this->listResultatAnnotation as $resultat)
		{
			$nom = $resultat->annotation->nom;
			$rep[$nom] = $nom;
		}
		
		return $rep;
	}
}
?>