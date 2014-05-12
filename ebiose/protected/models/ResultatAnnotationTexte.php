<?php

/**
 * This is the model class for table "resultat_annotation_texte".
 *
 * The followings are the available columns in table 'resultat_annotation_texte':
 * @property integer $id
 * @property integer $annotation_id
 * @property integer $objet_id
 * @property integer $type_objet
 * @property string $valeur
 *
 * The followings are the available model relations:
 * @property Annotation $annotation
 */
class ResultatAnnotationTexte extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ResultatAnnotationTexte the static model class
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
		return 'resultat_annotation_texte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('annotation_id, objet_id, type_objet', 'required'),
			array('annotation_id, objet_id, type_objet', 'numerical', 'integerOnly'=>true),
			array('valeur', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, annotation_id, objet_id, type_objet, valeur', 'safe', 'on'=>'search'),
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
			'annotation' => array(self::BELONGS_TO, 'Annotation', 'annotation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'annotation_id' => 'Annotation',
			'objet_id' => 'Objet',
			'type_objet' => 'Type Objet',
			'valeur' => 'Valeur',
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
		$criteria->compare('annotation_id',$this->annotation_id);
		$criteria->compare('objet_id',$this->objet_id);
		$criteria->compare('type_objet',$this->type_objet);
		$criteria->compare('valeur',$this->valeur,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function loadModel($idAnnotation,$idObjet)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('annotation_id',$idAnnotation);
		$criteria->compare('objet_id',$idObjet);
		$model = ResultatAnnotationTexte::model()->findAll($criteria);
		if(count($model)==0)
		{
			$model =new ResultatAnnotationTexte();
			$model->annotation_id = $idAnnotation;
			$model->objet_id=$idObjet;
		}
		else 
			$model = $model[0];
		return $model;
	}
	
	public function getValeurString()
	{
		return $this->valeur;
	}
}