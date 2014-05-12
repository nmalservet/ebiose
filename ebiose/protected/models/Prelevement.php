<?php

/**
 * This is the model class for table "prelevement".
 *
 * The followings are the available columns in table 'prelevement':
 * @property integer $id
 * @property string $identifier
 * @property integer $patient_id
 * @property integer $type_prelevement_id
 * @property integer $site_provenance_id
 * @property string $description
 * @property string $date_creation
 * @property string $date_prelevement
 * @property string $date_arrivee
 * @property integer $transport_step_id
 *
 * The followings are the available model relations:
 * @property Patient $patient
 * @property TransportStep $transportStep
 * @property TypePrelevement $typePrelevement
 */
class Prelevement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Prelevement the static model class
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
		return 'prelevement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('identifier,patient_id, date_creation', 'required'),
			array('patient_id, type_prelevement_id, site_provenance_id, transport_step_id', 'numerical', 'integerOnly'=>true),
			array('identifier, description', 'length', 'max'=>250),
			array('date_prelevement, date_arrivee', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, identifier, patient_id, type_prelevement_id, site_provenance_id, description, date_creation, date_prelevement, date_arrivee, transport_step_id', 'safe', 'on'=>'search'),
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
			'patient' => array(self::BELONGS_TO, 'Patient', 'patient_id'),
			'transportStep' => array(self::BELONGS_TO, 'TransportStep', 'transport_step_id'),
			'typePrelevement' => array(self::BELONGS_TO, 'TypePrelevement', 'type_prelevement_id'),
			'siteProvenance'=>array(self::BELONGS_TO, 'Site', 'site_provenance_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'identifier' => Yii::t('common','attr_prelevement_identifier'),
			'patient_id' => Yii::t('common','attr_prelevement_patient_id'),
			'type_prelevement_id' => Yii::t('common','attr_prelevement_type_prelevement_id'),
			'site_provenance_id' => Yii::t('common','attr_prelevement_site_provenance_id'),
			'description' => Yii::t('common','attr_prelevement_description'),
			'date_creation' => Yii::t('common','attr_prelevement_date_creation'),
			'date_prelevement' => Yii::t('common','attr_prelevement_date_prelevement'),
			'date_arrivee' => Yii::t('common','attr_prelevement_date_arrivee'),
			'transport_step_id' => Yii::t('common','attr_prelevement_transport_step_id'),
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
		$criteria->compare('identifier',$this->identifier,true);
		$criteria->compare('patient_id',$this->patient_id);
		$criteria->compare('type_prelevement_id',$this->type_prelevement_id);
		$criteria->compare('site_provenance_id',$this->site_provenance_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('date_creation',$this->date_creation,true);
		$criteria->compare('date_prelevement',$this->date_prelevement,true);
		$criteria->compare('date_arrivee',$this->date_arrivee,true);
		$criteria->compare('transport_step_id',$this->transport_step_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}