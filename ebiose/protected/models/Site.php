<?php

/**
 * This is the model class for table "site".
 *
 * The followings are the available columns in table 'site':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property string $adresse
 * @property string $ville
 * @property integer $pays
 * @property string $code_postal
 * @property string $finess
 */
class Site extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Site the static model class
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
		return 'site';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom', 'required'),
			array('pays', 'length', 'max'=>2),
			array('nom, description', 'length', 'max'=>250),
			array('adresse', 'length', 'max'=>200),
			array('ville, finess', 'length', 'max'=>50),
			array('code_postal', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, adresse, ville, pays, code_postal, finess', 'safe', 'on'=>'search'),
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
			'code_postal' => 'Code Postal',
			'finess' => 'Finess',
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
		$criteria->compare('code_postal',$this->code_postal,true);
		$criteria->compare('finess',$this->finess,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

	

	/**
	 * 
	 * @return chaine contenant l'adresse et la ville du site (ou l'un des deux si l'autre est vide)
	 */
	public function getAdresseVille()
	{
		$valeurAdresse;
		if($this->ville == null)
		{$valeurAdresse = $this->adresse;}
		elseif($this->adresse == null)
		{$valeurAdresse = $this->ville;}
		else
		{$valeurAdresse = $this->adresse.", ".$this->ville;}
		return $valeurAdresse;
	}
}