<?php

/**
 * This is the model class for table "log_activity".
 *
 * The followings are the available columns in table 'log_activity':
 * @property integer $id
 * @property integer $action
 * @property integer $user_id
 * @property integer $element_id
 * @property integer $table_id
 * @property integer $field_id
 * @property string $old_value
 * @property string $new_value
 * @property string $date_action
 *
 * The followings are the available model relations:
 * @property User $user
 */
class LogActivity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LogActivity the static model class
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
		return 'log_activity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('action, user_id, date_action', 'required'),
			array('action, user_id, element_id, table_id, field_id', 'numerical', 'integerOnly'=>true),
			array('old_value, new_value', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, action, user_id, element_id, table_id, field_id, old_value, new_value, date_action', 'safe', 'on'=>'search'),
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
			'action' => 'Action',
			'user_id' => 'User',
			'element_id' => 'Element',
			'table_id' => 'Table',
			'field_id' => 'Field',
			'old_value' => 'Old Value',
			'new_value' => 'New Value',
			'date_action' => 'Date Action',
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
		$criteria->compare('action',$this->action);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('element_id',$this->element_id);
		$criteria->compare('table_id',$this->table_id);
		$criteria->compare('field_id',$this->field_id);
		$criteria->compare('old_value',$this->old_value,true);
		$criteria->compare('new_value',$this->new_value,true);
		$criteria->compare('date_action',$this->date_action,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}