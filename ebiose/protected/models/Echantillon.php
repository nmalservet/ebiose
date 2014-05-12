<?php

/**
 * This is the model class for table "echantillon".
 *
 * The followings are the available columns in table 'echantillon':
 * @property integer $id
 * @property integer $type_id
 * @property integer $site_provenance_id
 * @property string $identifier
 * @property string $description
 * @property integer $quality
 * @property integer $quantity
 * @property integer $quantity_unity
 * @property decimal $volume
 * @property integer $volume_unity
 * @property integer $parent_id
 * @property integer $conteneur_id
 * @property integer $position
 * @property integer $prelevement_id
 *
 * The followings are the available model relations:
 * @property catalogue[] $catalogues
 * @property conteneur $conteneur
 * @property typeechantillon $type
 * @property resultatanalysearea[] $resultatanalyseareas
 * @property resultatanalysecheckboxes[] $resultatanalysecheckboxess
 * @property resultatanalysefichier[] $resultatanalysefichiers
 * @property resultatanalyseselectlist[] $resultatanalyseselectlists
 * @property resultatanalysetexte[] $resultatanalysetextes
 */
class Echantillon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return echantillon the static model class
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
		return 'echantillon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('identifier', 'required'),
			array('type_id, site_provenance_id, quality,volume_unity, quantity, quantity_unity, parent_id, conteneur_id, position, prelevement_id', 'numerical', 'integerOnly'=>true),
			array('identifier, description', 'length', 'max'=>250),
				array('volume', 'length', 'max'=>7),
			// the following rule is used by search().
			// please remove those attributes that should not be searched.
			array('id, type_id, site_provenance_id, identifier, description, quality,volume,volume_unity, quantity, quantity_unity, parent_id, conteneur_id, position', 'safe', 'on'=>'search'),
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
			'catalogues' => array(self::MANY_MANY, 'Catalogue', 'catalogue_echantillon(id_echantillon, id_catalogue)'),
			'conteneur' => array(self::BELONGS_TO, 'Conteneur', 'conteneur_id'),
			'type' => array(self::BELONGS_TO, 'TypeEchantillon', 'type_id'),
			'site_provenance' => array(self::BELONGS_TO, 'Site', 'site_provenance_id'),
			'parent' => array(self::BELONGS_TO, 'Echantillon', 'parent_id'),
			'prelevement' => array(self::BELONGS_TO, 'Prelevement', 'prelevement_id'),
			'resultatanalyseareas' => array(self::HAS_MANY, 'ResultatAnalyseArea', 'echantillon_id'),
			'resultatanalysecheckboxess' => array(self::HAS_MANY, 'ResultatAnalysecheckboxes', 'echantillon_id'),
			'resultatanalysefichiers' => array(self::HAS_MANY, 'ResultatAnalysefichier', 'echantillon_id'),
			'resultatanalyseselectlists' => array(self::HAS_MANY, 'ResultatAnalyseselectlist', 'echantillon_id'),
			'resultatanalysetextes' => array(self::HAS_MANY, 'ResultatAnalysetexte', 'echantillon_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('common','attr_echantillon_id'),
			'type_id' => Yii::t('common','attr_echantillon_type_id'),
			'site_provenance_id' => Yii::t('common','attr_echantillon_site_provenance_id'),
			'identifier' => Yii::t('common','attr_echantillon_identifier'),
			'description' => Yii::t('common','attr_echantillon_description'),
			'quality' => Yii::t('common','attr_echantillon_quality'),
			'volume' => Yii::t('common','attr_echantillon_volume'),
			'volume_unity' => Yii::t('common','attr_echantillon_volume_unity'),
			'quantity' => Yii::t('common','attr_echantillon_quantity'),
			'quantity_unity' => Yii::t('common','attr_echantillon_quantity_unity'),
			'parent_id' => Yii::t('common','attr_echantillon_parent_id'),
			'conteneur_id' => Yii::t('common','attr_echantillon_conteneur_id'),
			'position' => Yii::t('common','attr_echantillon_position'), 
			'destockage_id' => Yii::t('common','attr_echantillon_destockage_id'), 
			'collection_id' => Yii::t('common','attr_echantillon_collection_id'), 
			'prelevement_id' => Yii::t('common','attr_echantillon_prelevement_id'), 
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('site_provenance_id',$this->site_provenance_id);
		$criteria->compare('identifier',$this->identifier,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('quality',$this->quality);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('volume_unity',$this->volume_unity);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('quantity_unity',$this->quantity_unity);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('conteneur_id',$this->conteneur_id);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getNomSiteProvenance()
	{
		$res = "Non définie";
		if(isset($this->site_provenance))
		{
			$res = $this->site_provenance->nom;
		}
		return $res;
	}
	
	public function getNomTypeEchantillon()
	{
		$res = "Non définie";
		if(isset($this->type))
		{
			$res = $this->type->nom;
		}
		return $res;
	}
	
	public function getNomConteneur()
	{
		$res = "Non définie";
		if(isset($this->conteneur))
		{
			$res = $this->conteneur->nom;
		}
		return $res;
	}
	
	public function getNomParent()
	{
		$res = "Non définie";
		if(isset($this->parent))
		{
			$res = $this->parent->identifier;
		}
		return $res;
	}	
	
	public function getNomPrelevement()
	{
		return $this->prelevement->identifier;
	}
	
	public function getFils()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('parent_id', $this->id);
		return $this->findAll($criteria);
	}
}