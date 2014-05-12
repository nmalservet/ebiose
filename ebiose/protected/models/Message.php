<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property integer $id
 * @property integer $reponse_id
 * @property string $date
 * @property integer $auteur
 * @property integer $destinataire
 * @property string $sujet
 * @property string $message
 * @property integer $lu
 * @property integer $trashed
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, auteur, destinataire, message', 'required'),
			array('reponse_id, auteur, destinataire, lu, trashed', 'numerical', 'integerOnly'=>true),
			array('date', 'length', 'max'=>20),
			array('sujet', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, reponse_id, date, auteur, destinataire, sujet, message, lu, trashed', 'safe', 'on'=>'search'),
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
				'auteurM' => array(self::BELONGS_TO, 'User', 'auteur'),
				'destinataireM' => array(self::BELONGS_TO, 'User', 'destinataire'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'reponse_id' => 'Reponse',
			'date' => 'Date',
			'auteur' => 'De',
			'destinataire' => 'Destinataire',
			'sujet' => 'Sujet',
			'message' => 'Message',
			'lu' => 'Lu',
			'trashed' => 'Trashed',
		);
	}

	public function getLuOption(){
		return array(
				1=>'<img src="'.Constants::PATH_IMAGE.'tick.png" >',
				0=>'<img src="'.Constants::PATH_IMAGE.'flag_red.png" >',
		);
	}
	
	/**
	 * conversion d'un status de studio
	 */
	public function getLu()
	{
		$array  = self::getLuOption();
		return $array[$this->lu];
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
		$criteria->compare('reponse_id',$this->reponse_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('auteur',$this->auteur);
		$criteria->compare('destinataire',$this->destinataire);
		$criteria->compare('sujet',$this->sujet,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('lu',$this->lu);
		$criteria->compare('trashed',$this->trashed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAuteurByIdUser($auteur_id)
	{
		$recordUser=User::model()->findByAttributes(array('id'=>$auteur_id));
		return $recordUser->nom + " " + $recordUser->prenom;
	}
}