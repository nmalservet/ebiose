<?php

/**
 * This is the model class for table "tache".
 *
 * The followings are the available columns in table 'tache':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property string $date_limite
 * @property string $date_creation
 *
 * The followings are the available model relations:
 * @property User[] $users
 */
class Tache extends CActiveRecord
{
	public $heure_limite;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tache the static model class
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
		return 'tache';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nom, date_creation', 'required'),
			array('nom, description', 'length', 'max'=>45),
			array('date_limite', 'safe'),
			array('date_limite', 'date', 'format'=>'yyyy-M-d'),
			array('heure_limite', 'date', 'format'=>'hhhmm'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, date_limite, date_creation', 'safe', 'on'=>'search'),
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
			'users' => array(self::MANY_MANY, 'User', 'assignation_tache(tache_id, user_id)'),
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
			'date_limite' => 'Date Limite',
			'heure_limite' => 'Heure Limite',
			'date_creation' => 'Date Creation',
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
		$criteria->compare('date_limite',$this->date_limite,true);
		$criteria->compare('date_creation',$this->date_creation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function saveEchantillon($id_user){
		$sql = "INSERT INTO assignation_tache VALUES ($id_user, $this->id, ".date("Y-m-d").")";// H:i:s").")";
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();
	}
	
	public function removeEchantillon($id_user){
		$sql = "DELETE FROM assignation_tache WHERE id_tache = $this->id AND id_user = $id_user";
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();
	}
}