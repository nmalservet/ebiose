<?php

/**
 * This is the model class for table "reservation_machine".
 *
 * The followings are the available columns in table 'reservation_machine':
 * @property integer $id
 * @property integer $machine_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 * @property string $message
 *
 * The followings are the available model relations:
 * @property Machine $machine
 * @property User $user
 */
class ReservationMachine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ReservationMachine the static model class
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
		return 'reservation_machine';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('machine_id, start_date, end_date, user_id, message', 'required'),
			array('machine_id, user_id', 'numerical', 'integerOnly'=>true),
			array('start_date, end_date', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, machine_id, start_date, end_date, user_id, message', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'machine_id' => 'Machine',
			'start_date' => 'Date de début',
			'end_date' => 'Date de fin',
			'user_id' => 'User',
			'message' => 'Message',
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
		$criteria->compare('machine_id',$this->machine_id);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('message',$this->message,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}