<?php

/**
 * This is the model class for table "machine".
 *
 * The followings are the available columns in table 'machine':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property string $couleur
 *
 * The followings are the available model relations:
 * @property Analyse[] $analyses
 * @property ReservationMachine[] $reservationMachines
 */
class Machine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Machine the static model class
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
		return 'machine';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom, description', 'length', 'max'=>250),
			array('couleur', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, couleur', 'safe', 'on'=>'search'),
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
			'analyses' => array(self::HAS_MANY, 'Analyse', 'machine_id'),
			'reservationMachines' => array(self::HAS_MANY, 'ReservationMachine', 'machine_id'),
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
			'couleur' => 'Couleur',
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
		$criteria->compare('couleur',$this->couleur,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function renderCouleur(){
		return "<div style=\"height:20px;width:50px;background:".$this->couleur.";\"> </div>";
	}
	
	public function getArrayMachines()
	{
		$res = array();
		//recuperation du tableau associatif de la requete
		$command = Yii::app()->db->createCommand('SELECT id, nom FROM machine;');
		$array = $command->queryAll();
		//construction du tableau des studios
		foreach ($array as $row)
		{
			$res[$row["id"]] = $row["nom"];
		}
		return $res;
	}
}