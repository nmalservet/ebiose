<?php
/**
 * ConteneurController.php
 *
 *
 * @author malservet nicolas <nicolas@malservet.eu>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2008-2013 BioSoftwareFactory
 * @license LGPL version 3
 * @package controllers
 * @since 1.0
 */
?>
<?php

class ConteneurController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/menustockage';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * 
	 * @param String $action action a faire apres le choix (delete ou update)
	 */
	public function actionChose($action)
	{
		$listConteneur=array();
		$modelConteneur=Conteneur::model()->findAll();
		$model = new ChoixConteneurForm;
		if(isset($_POST['ChoixConteneurForm']))
		{
			$model->conteneur=$_POST['ChoixConteneurForm']['conteneur'];
			if($action=="update")
			{
				$this->redirect(array('update','id'=>$model->conteneur));
			}
			else if($action=="delete")
			{
				$this->redirect(array('deleteWithoutPost','id'=>$model->conteneur));
			}
		}
		foreach ($modelConteneur as $row)
		{
			$listConteneur[$row["id"]] = $row["nom"];
		}
		$this->render('chose',array(
				'listConteneur'=>$listConteneur,
				'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Conteneur;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Conteneur']))
		{
			$model->attributes=$_POST['Conteneur'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'succes_create_conteneur'));
				$this->redirect(array('view','id'=>$model->id));
			}
			else
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'fail_create_conteneur'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Conteneur']))
		{
			$model->attributes=$_POST['Conteneur'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'succes_update_conteneur'));
				$this->redirect(array('view','id'=>$model->id));
			}
			else
			{
				Yii::app()->user->setFlash('success', Yii::t('common', 'fail_update_conteneur'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Without post car l'action delete ne passe pas si il n'y a pas de POST setter.
	 * @param int $id
	 */
	public function actionDeleteWithoutPost($id)
	{
		if($this->loadModel($id)->delete())
		{
			Yii::app()->user->setFlash('success', Yii::t('common', 'succes_delete_conteneur'));
		}
		else
		{
			Yii::app()->user->setFlash('error', Yii::t('common', 'fail_delete_conteneur'));
		}
		$this->redirect(array('admin'));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Conteneur');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Conteneur('search');
		$model->unsetAttributes();  // clear any default values
		
		$listConteneur = Conteneur::model()->findAll();
		$noeud = new NoeudConteneur(null);
		$noeud->listFils = Conteneur::makeFils(null, $listConteneur);
		
		if(isset($_GET['Conteneur']))
			$model->attributes=$_GET['Conteneur'];

		$this->render('admin',array(
			'model'=>$model,
			'noeud'=>$noeud,
		));
	}
	
	/**
	 * action qui permet de placer des echantillons dans une boite
	 */
	public function actionPlacer()
	{
		//construction de la liste des echantillons qui ne sont pas encore placer
		//liste avec tout les echantillon
		$listeEchantillon = Echantillon::model()->findAll();
		//liste sans ceux qui sont deja placer
		$echantillons = array();
		foreach($listeEchantillon as $echantillon)
		{
			if(!isset($echantillon->conteneur_id))
			{
				$echantillons[] = $echantillon;
			}
		}
		
		$model=new Conteneur('search');
		$model->unsetAttributes();  // clear any default values
		
		$listConteneur = Conteneur::model()->findAll();
		$noeud = new NoeudConteneur(null);
		$noeud->listFils = Conteneur::makeFils(null, $listConteneur);
		
		$this->render('placer',array(
				'model'=>$model,
				'noeud'=>$noeud,
				'listEchantillon'=>$echantillons,
		));
	}
	
	public function actionAddEchantillons()
	{
		//echo "ici1<br>";
		if($this->listCompatible($_POST))
		{
			//echo "ici2<br>";
			//on recupere la liste des id d'echantillon a placer dans le conteneur
			$listIdEchantillon = array();
			if(isset($_POST['echantillon-grid_c10']))
			{
				foreach($_POST['echantillon-grid_c10'] as $id_echantillon)
				{
					$listIdEchantillon[] = $id_echantillon;
				}
			}
			
			$i = 0;
			foreach ($_POST as $key => $value)
			{
				if(substr($key, 0, 3) == "cbc")
				{
					//echo "ici";
					
					$keyString = substr($key, 3, strlen($key)-1);
					$id_conteneur = $this->getConteneurId($keyString);
					$position = $this->getPosition($keyString);
					$id_echantillon = $listIdEchantillon[$i];
					
					$modelEchantillon = Echantillon::model()->findByPk($id_echantillon);
					$modelEchantillon->conteneur_id = $id_conteneur;
					$modelEchantillon->position = $position;

					$modelEchantillon->save();
					$i++;
				}
			}
		}
		$this->actionAdmin();
	}

	//revoie si les liste d'echantillon et de position de conteneur sont compatible
	private function listCompatible($Post)
	{
		$res = true;
		$nbCBConteneur = 0;
		$nbCBEchantillon = 0;
		
		//test qu'il n'y est qu'un seul conteneur
		$passage = 1;
		foreach($_POST as $key => $value)
		{
			$typPost = substr($key, 0, 3);
			if($typPost == "cbc")
			{
				$nbCBConteneur++;
				$keyString = substr($key, 3, strlen($key)-1);
				$id_conteneur = $this->getConteneurId($keyString);
				//si ce n'est pas le premier passage on connais l'id du conteneur
				if($passage != 1)
				{
					if($id_conteneur != $ancienId)
					{
						$res = false;
					}
				}
				$ancienId = $id_conteneur;
				$passage++;
			}
			elseif($typPost == "ech")
			{
				$nbCBEchantillon = count($value);
			}
		}
		if($nbCBEchantillon != $nbCBConteneur)
		{
			$res = false;
		}
		return $res;
	}
	
	private function getConteneurId($keyString)
	{
		$res = "";
		$length = strlen($keyString);
		if($length > 0)
		{
			$fin = strrpos($keyString,"_");
			for($i = 0; $i < $fin; $i++)
			{
				$res = $keyString[$i];
			}
		}
		return $res;
	}
	
	private function getPosition($keyString)
	{
		$res = "";
		$length = strlen($keyString);
		if($length > 0)
		{
			$deb = strrpos($keyString,"_");
			for($j = $deb+1; $j < $length; $j++)
			{
				$res .= $keyString[$j];
			}
		}
		return $res;
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Conteneur::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='conteneur-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
