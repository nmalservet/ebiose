<?php
Yii::import('ext.ECSVExport');

class BSFController extends Controller
{
	function init()
	{
		parent::init();
		$app = Yii::app();
		if (isset($_GET['lang']))
		{
			$app->language = $_GET['lang'];
			$app->session['_lang'] = $app->language;
		}
		else
			if (isset($app->session['_lang']))
			{
				$app->language = $app->session['_lang'];
			}
	}
	
	public function insertLogFonctionnel($fonctionnalite,$idUser){
		$this->insertLogFonctionnelFull($fonctionnalite,$idUser,"","",0,"","");
	}
	
	public function insertLogFonctionnelFull($fonctionnalite,$idUser,$tableName,$fieldName,$objectId,$oldValue,$newValue){
		$model=new logfonctionnel;
		$format = "Y-m-d H:i:s";
		$dateCourante =date ( $format );
		$model->date_execution=$dateCourante;
		$model->user_id=$idUser;
		$model->fonctionnalite=$fonctionnalite;
		$model->table_name=$tableName;
		$model->field_name=$fieldName;
		$model->object_id=$objectId;
		$model->old_value=$oldValue;
		$model->new_value=$newValue;
		$model->save();
	}
	
	
}
?>