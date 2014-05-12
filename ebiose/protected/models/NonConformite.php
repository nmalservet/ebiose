<?php

/**
 * This is the model class for table "non_conformite".
 *
 * The followings are the available columns in table 'non_conformite':
 * @property integer $id
 * @property string $nom
 * @property string $date_creation
 * @property string $date_debut_nc
 * @property string $date_fin_nc
 * @property string $description
 * @property integer $niveau_importance
 *
 * The followings are the available model relations:
 * @property Echantillon[] $echantillons
 * @property NiveauImportantceNonConformite $niveau
 */
class NonConformite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NonConformite the static model class
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
		return 'non_conformite';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('nom, date_creation, niveau_importance_id', 'required'),
			array('niveau_importance_id', 'numerical', 'integerOnly'=>true),
			array('nom, description', 'length', 'max'=>45),
			array('date_debut_nc, date_fin_nc', 'safe'),
			array('id, nom, date_creation, date_debut_nc, date_fin_nc, description, niveau_importance_id', 'safe', 'on'=>'search'),
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
			'echantillons' => array(self::MANY_MANY, 'Echantillon', 'echantillon_has_non_conformite(non_conformite_id, echantillon_id)'),
			'niveau'=>array(self::BELONGS_TO, 'NiveauImportanceNonConformite', 'niveau_importance_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('common','attr_non_conformite_id'),
			'nom' => Yii::t('common','attr_non_conformite_nom'),
			'date_creation' => Yii::t('common','attr_non_conformite_date_creation'),
			'date_debut_nc' => Yii::t('common','attr_non_conformite_date_debut_nc'),
			'date_fin_nc' => Yii::t('common','attr_non_conformite_date_fin_nc'),
			'description' => Yii::t('common','attr_non_conformite_description'),
			'niveau_importance_id' => Yii::t('common','attr_non_conformite_niveau_importance_id'),
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
		$criteria->compare('date_creation',$this->date_creation,true);
		$criteria->compare('date_debut_nc',$this->date_debut_nc,true);
		$criteria->compare('date_fin_nc',$this->date_fin_nc,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('niveau_importance_id',$this->niveau_importance_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}