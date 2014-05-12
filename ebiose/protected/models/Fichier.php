<?php

/**
 * This is the model class for table "fichier".
 *
 * The followings are the available columns in table 'fichier':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property string $suffixe
 * @property integer $dossier_id
 *
 * The followings are the available model relations:
 * @property Dossier $dossier
 * @property ResultatAnalyseFichier[] $resultatAnalyseFichiers
 */
class Fichier extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Fichier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fichier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dossier_id', 'numerical', 'integerOnly'=>true),
			array('nom, description', 'length', 'max'=>250),
			array('suffixe', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, suffixe, dossier_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'dossier' => array(self::BELONGS_TO, 'Dossier', 'dossier_id'),
			'resultatAnalyseFichiers' => array(self::HAS_MANY, 'ResultatAnalyseFichier', 'valeur'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nom' => 'Nom',
			'description' => 'Description',
			'suffixe' => 'Suffixe',
			'dossier_id' => 'Dossier',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nom',$this->nom,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('suffixe',$this->suffixe,true);
		$criteria->compare('dossier_id',$this->dossier_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}