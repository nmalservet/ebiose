<?php

/**
 * This is the model class for table "catalogue".
 *
 * The followings are the available columns in table 'catalogue':
 * @property integer $id
 * @property string $nom
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Echantillon[] $echantillons
 */
class Catalogue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Catalogue the static model class
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
		return 'catalogue';
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
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description', 'safe', 'on'=>'search'),
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
			'echantillons' => array(self::MANY_MANY, 'Echantillon', 'catalogue_echantillon(id_catalogue, id_echantillon)'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function saveEchantillon($id_echantillon){
		$sql = "INSERT INTO catalogue_echantillon VALUES ($this->id, $id_echantillon)";
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();
	}
	
	public function removeEchantillon($id_echantillon){
		$sql = "DELETE FROM catalogue_echantillon WHERE id_catalogue = $this->id AND id_echantillon = $id_echantillon";
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();
	}
}