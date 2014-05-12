<?php

/**
 * This is the model class for table "dossier".
 *
 * The followings are the available columns in table 'dossier':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property integer $parent_id
 * @property boolean $affiche
 *
 * The followings are the available model relations:
 * @property Dossier $parent
 * @property Dossier[] $dossiers
 * @property Fichier[] $fichiers
 */
class Dossier extends CActiveRecord
{
	
	public $affiche;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dossier the static model class
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
		return 'dossier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('nom, description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, parent_id', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Dossier', 'parent_id'),
			'dossiers' => array(self::HAS_MANY, 'Dossier', 'parent_id'),
			'fichiers' => array(self::HAS_MANY, 'Fichier', 'dossier_id'),
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
			'parent_id' => 'Parent',
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
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}