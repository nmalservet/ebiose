<?php

/**
 * This is the model class for table "annotation".
 *
 * The followings are the available columns in table 'annotation':
 * @property integer $id
 * @property string $nom
 * @property string $description
 * @property integer $type_annotation
 * @property integer $type_objet
 * @property integer $inactive
 *
 * The followings are the available model relations:
 * @property Collection[] $collections
 * @property ResultatAnnotationTexte[] $resultatAnnotationTextes
 * @property ValueOptionAnnotation[] $valueOptionAnnotations
 */
class Annotation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Annotation the static model class
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
		return 'annotation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_annotation, type_objet', 'required'),
			array('type_annotation, type_objet, inactive', 'numerical', 'integerOnly'=>true),
			array('nom, description', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nom, description, type_annotation, type_objet, inactive', 'safe', 'on'=>'search'),
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
			'collections' => array(self::MANY_MANY, 'Collection', 'annotation_collection(id_annotation, id_collection)'),
			'resultatAnnotationTextes' => array(self::HAS_MANY, 'ResultatAnnotationTexte', 'annotation_id'),
			'valueOptionAnnotations' => array(self::HAS_MANY, 'ValueOptionAnnotation', 'id_annotation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('common','attr_annotation_id'),
			'nom' => Yii::t('common','attr_annotation_nom'),
			'description' => Yii::t('common','attr_annotation_description'),
			'type_annotation' => Yii::t('common','attr_annotation_type_annotation'),
			'type_objet' => Yii::t('common','attr_annotation_type_objet'),
			'inactive' => Yii::t('common','attr_annotation_inactive'),
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
		$criteria->compare('type_annotation',$this->type_annotation);
		$criteria->compare('type_objet',$this->type_objet);
		$criteria->compare('inactive',$this->inactive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTypeAnnotationString()
	{
		$rep = Constants::getTypeAnnotationOption();
		return $rep[$this->type_annotation];
	}
	
	public function getTypeObjetString()
	{
		$rep = Constants::getTypeObjetAnnotationOption();
		return $rep[$this->type_objet];
	}
	
	public function getInactiveString()
	{
		$rep = array(0=>'Non',1=>'Oui');
		return $rep[$this->inactive];
	}
	
	public static function getTypeAnnotationForString($type)
	{
		$tabTypeObjet = Constants::getTypeObjetAnnotationOption();
		$i=0;
		$trouv=false;
		while(!trouv && $i < tabTypeObjet.length)
		{
			if($tabTypeObjet[$i]==$type)
			{
				$trouv =true;
			}
		}
		return $i;
	}
}