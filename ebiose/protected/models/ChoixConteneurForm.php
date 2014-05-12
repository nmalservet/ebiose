<?php

/**
 * ChoixConteneurForm class.
 */
class ChoixConteneurForm extends CFormModel
{
	public $conteneur;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'conteneur'=>Yii::t('common','conteneur'),
		);
	}
}
