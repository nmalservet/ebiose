<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $prenom
 * @property string $nom
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $telephone
 * @property string $gsm
 * @property integer $inactif
 * @property integer $fonction_utilisateur_id
 *
 * The followings are the available model relations:
 * @property LogActivity[] $logActivities
 * @property News[] $news
 * @property Tache[] $taches
 * @property ReservationMachine[] $reservationMachines
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inactif, fonction_utilisateur_id', 'numerical', 'integerOnly'=>true),
			array('prenom, nom, login, password, email, telephone, gsm', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, prenom, nom, login, password, email, telephone, gsm,fonction_utilisateur_id, inactif', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'logActivities' => array(self::HAS_MANY, 'LogActivity', 'user_id'),
			'news' => array(self::HAS_MANY, 'News', 'user_id'),
			'reservationMachines' => array(self::HAS_MANY, 'ReservationMachine', 'user_id'),
			'taches' => array(self::MANY_MANY, 'Tache', 'assignation_tache(tache_id, user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'prenom' => 'Prenom',
			'nom' => 'Nom',
			'login' => 'Login',
			'password' => 'Password',
			'email' => 'Email',
			'telephone' => 'Telephone',
			'gsm' => 'Gsm',
			'inactif' => 'Inactif',
			'fonction_utilisateur_id' => 'Fonction'
		);
	}

	public function getNomPrenom()
	{
		return $this->nom." ".$this->prenom;
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('prenom',$this->prenom,true);
		$criteria->compare('nom',$this->nom,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('gsm',$this->gsm,true);
		$criteria->compare('inactif',$this->inactif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}