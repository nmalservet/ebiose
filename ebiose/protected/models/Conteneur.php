<?php

/**
 * This is the model class for table "conteneur".
 *
 * The followings are the available columns in table 'conteneur':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property integer $nb_max_emplacements
 * @property integer $parent_id
 * @property integer $type_conteneur
 * @property integer $longueur
 * @property integer $largeur
 *
 * The followings are the available model relations:
 * @property Conteneur $parent
 * @property Conteneur[] $conteneurs
 * @property Echantillon[] $echantillons
 */
class Conteneur extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Conteneur the static model class
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
		return 'conteneur';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nb_max_emplacements, parent_id, type_conteneur', 'numerical', 'integerOnly'=>true),
			array('nom, description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, nb_max_emplacements, parent_id, type_conteneur', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Conteneur', 'parent_id'),
			'conteneurs' => array(self::HAS_MANY, 'Conteneur', 'parent_id'),
			'echantillons' => array(self::HAS_MANY, 'Echantillon', 'conteneur_id'),
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
			'nb_max_emplacements' => 'Nb Max Emplacements',
			'parent_id' => 'Parent',
			'type_conteneur' => 'Type Conteneur',
			'longueur' => 'Longueur',
			'largeur' => 'Largeur',
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
		$criteria->compare('nb_max_emplacements',$this->nb_max_emplacements);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('type_conteneur',$this->type_conteneur);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function saveEchantillon($position, $id_echantillon){
		$sql = "UPDATE echantillon SET position=\"$position\" AND conteneur_id=\"$this->id\" WHERE id=\"$id_echantillon\"";
		$command = Yii::app()->db->createCommand($sql);
		$command->execute();
	}
	
	public function makeFils($id, $listConteneur)
	{
		$resultat = array();
		foreach($listConteneur as $conteneur)
		{
			if($conteneur->parent_id == $id)
			{
				$noeud = new NoeudConteneur($conteneur);
				$noeud->listFils = Conteneur::makeFils($noeud->id, $listConteneur);
				$resultat[] = $noeud;
			}
		}
		return $resultat;
	}
}