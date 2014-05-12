<?php

/**
 * This is the model class for table "cession".
 *
 * The followings are the available columns in table 'cession':
 * @property integer $id
 * @property integer $contact_id
 * @property string $date_demande
 * @property integer $transport_step_id
 * @property string $notes
 * @property integer $statut_cession
 * @property integer $demande_cession_id
 *
 * The followings are the available model relations:
 * @property DemandeCession $demandeCession
 * @property TransportStep $transportStep
 * @property Echantillon[] $echantillons
 */
class Cession extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cession the static model class
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
		return 'cession';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contact_id, date_demande, statut_cession', 'required'),
			array('contact_id, transport_step_id, statut_cession, demande_cession_id', 'numerical', 'integerOnly'=>true),
			array('notes', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contact_id, date_demande, transport_step_id, notes, statut_cession, demande_cession_id', 'safe', 'on'=>'search'),
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
			'demandeCession' => array(self::BELONGS_TO, 'DemandeCession', 'demande_cession_id'),
			'transportStep' => array(self::BELONGS_TO, 'TransportStep', 'transport_step_id'),
			'echantillons' => array(self::MANY_MANY, 'Echantillon', 'cession_echantillon(id_cession, id_echantillon)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'contact_id' => 'Contact',
			'date_demande' => 'Date Demande',
			'transport_step_id' => 'Transport Step',
			'notes' => 'Notes',
			'statut_cession' => 'Statut Cession',
			'demande_cession_id' => 'Demande Cession',
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
		$criteria->compare('contact_id',$this->contact_id);
		$criteria->compare('date_demande',$this->date_demande,true);
		$criteria->compare('transport_step_id',$this->transport_step_id);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('statut_cession',$this->statut_cession);
		$criteria->compare('demande_cession_id',$this->demande_cession_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}