<?php

/**
 * This is the model class for table "transporteur".
 *
 * The followings are the available columns in table 'transporteur':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property string $adresse
 * @property string $ville
 * @property string $pays
 *
 * The followings are the available model relations:
 * @property TransportStep[] $transportSteps
 */
class Transporteur extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Transporteur the static model class
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
		return 'transporteur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom, description, adresse, ville', 'length', 'max'=>45),
			array('pays', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, adresse, ville, pays', 'safe', 'on'=>'search'),
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
			'transportSteps' => array(self::HAS_MANY, 'TransportStep', 'transporteur_id'),
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
			'adresse' => 'Adresse',
			'ville' => 'Ville',
			'pays' => 'Pays',
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
		$criteria->compare('adresse',$this->adresse,true);
		$criteria->compare('ville',$this->ville,true);
		$criteria->compare('pays',$this->pays,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}