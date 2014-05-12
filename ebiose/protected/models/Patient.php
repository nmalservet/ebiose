<?php

/**
 * This is the model class for table "patient".
 *
 * The followings are the available columns in table 'patient':
 * @property integer $id
 * @property string $ipp
 * @property string $nom_usuel
 * @property string $nom_naissance
 * @property string $date_naissance
 * @property integer $sexe
 * @property string $prenom
 * @property string $date_deces
 * @property integer $est_decede
 * @property string $adresse_naissance
 * @property string $ville_naissance
 * @property string $cp_naissance
 * @property string $pays_naissance
 */
class Patient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Patient the static model class
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
		return 'patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom_usuel, date_naissance, sexe', 'required'),
			array('sexe, est_decede', 'numerical', 'integerOnly'=>true),
			array('ipp, nom_usuel, nom_naissance, prenom', 'length', 'max'=>45),
			array('adresse_naissance, ville_naissance', 'length', 'max'=>100),
			array('cp_naissance', 'length', 'max'=>10),
			array('pays_naissance', 'length', 'max'=>2),
			array('date_deces', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ipp, nom_usuel, nom_naissance, date_naissance, sexe, prenom, date_deces, est_decede, adresse_naissance, ville_naissance, cp_naissance, pays_naissance', 'safe', 'on'=>'search'),
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
			'id' =>  Yii::t('common','attr_patient_id'),
			'ipp' => Yii::t('common','attr_patient_ipp'),
			'nom_usuel' => Yii::t('common','attr_patient_nom_usuel'),
			'date_naissance' => Yii::t('common','attr_patient_date_naissance'),
			'sexe' => Yii::t('common','attr_patient_sexe'),
			'prenom' => Yii::t('common','attr_patient_prenom'),
			'date_deces' => Yii::t('common','attr_patient_date_deces'),
			'est_decede' => Yii::t('common','attr_patient_est_decede'),
			'nom_naissance' => Yii::t('common','attr_patient_nom_naissance'),
			'adresse_naissance' => Yii::t('common','attr_patient_adresse_naissance'),
			'ville_naissance' => Yii::t('common','attr_patient_ville_naissance'),
			'cp_naissance' => Yii::t('common','attr_patient_cp_naissance'),
			'pays_naissance' => Yii::t('common','attr_patient_pays_naissance'),
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
		$criteria->compare('ipp',$this->ipp,true);
		$criteria->compare('nom_usuel',$this->nom_usuel,true);
		$criteria->compare('nom_naissance',$this->nom_naissance,true);
		$criteria->compare('date_naissance',$this->date_naissance,true);
		$criteria->compare('sexe',$this->sexe);
		$criteria->compare('prenom',$this->prenom,true);
		$criteria->compare('date_deces',$this->date_deces,true);
		$criteria->compare('est_decede',$this->est_decede);
		$criteria->compare('adresse_naissance',$this->adresse_naissance,true);
		$criteria->compare('ville_naissance',$this->ville_naissance,true);
		$criteria->compare('cp_naissance',$this->cp_naissance,true);
		$criteria->compare('pays_naissance',$this->pays_naissance,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getSexeString()
	{
		$rep = Constants::getSexeOption();
		return $rep[$this->sexe];
	}
	
	public function getEstDecedeString()
	{
		$rep = array(0=>Yii::t('common','non'),1=>Yii::t('common','oui'));
		return $rep[$this->est_decede];
	}
}