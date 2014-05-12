<?php

/**
 * This is the model class for table "analyse".
 *
 * The followings are the available columns in table 'analyse':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property integer $type_analyse
 * @property integer $machine_id
 * @property integer $inactive
 *
 * The followings are the available model relations:
 * @property Machine $machine
 * @property ResultatAnalyseArea[] $resultatAnalyseAreas
 * @property ResultatAnalyseCheckboxes[] $resultatAnalyseCheckboxes
 * @property ResultatAnalyseFichier[] $resultatAnalyseFichiers
 * @property ResultatAnalyseSelectlist[] $resultatAnalyseSelectlists
 * @property ResultatAnalyseTexte[] $resultatAnalyseTextes
 * @property ValueOptionAnalyse[] $valueOptionAnalyses
 */
class Analyse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Analyse the static model class
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
		return 'analyse';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_analyse, machine_id, inactive', 'numerical', 'integerOnly'=>true),
			array('nom, description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, type_analyse, machine_id, inactive', 'safe', 'on'=>'search'),
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
			'machine' => array(self::BELONGS_TO, 'Machine', 'machine_id'),
			'resultatAnalyseAreas' => array(self::HAS_MANY, 'ResultatAnalyseArea', 'analyse_id'),
			'resultatAnalyseCheckboxes' => array(self::HAS_MANY, 'ResultatAnalyseCheckboxes', 'analyse_id'),
			'resultatAnalyseFichiers' => array(self::HAS_MANY, 'ResultatAnalyseFichier', 'analyse_id'),
			'resultatAnalyseSelectlists' => array(self::HAS_MANY, 'ResultatAnalyseSelectlist', 'analyse_id'),
			'resultatAnalyseTextes' => array(self::HAS_MANY, 'ResultatAnalyseTexte', 'analyse_id'),
			'valueOptionAnalyses' => array(self::HAS_MANY, 'ValueOptionAnalyse', 'id_analyse'),
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
			'type_analyse' => 'Type Analyse',
			'machine_id' => 'Machine',
			'inactive' => 'Inactive',
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
		$criteria->compare('type_analyse',$this->type_analyse);
		$criteria->compare('machine_id',$this->machine_id);
		$criteria->compare('inactive',$this->inactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTypeAnalyse()
	{
		$tab = Constants::getTypeAnalyseOption();
		return $tab[$this->type_analyse];
	}
	
	public function getInactiveString()
	{
		return $this->inactive ? 'oui' : 'non';
	}
	
	public function getNomMachine()
	{
		$res = "";
		$machine = Machine::model()->findByPk($this->machine_id);
		if(isset($machine))
		{
			$res = $machine->nom;
		}
		return $res;
	}
}