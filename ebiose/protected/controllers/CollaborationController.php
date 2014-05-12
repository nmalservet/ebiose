<?php
/**
 * CollaborationController.php
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

class CollaborationController extends BSFController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/menucollaboration';

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
	 * Displays dashboard
	 */
	public function actionDashboard()
	{
		$events=array();
		$this->render('dashboard',array('events'=>$events));
	}
	public function actionPlanning()
	{
		$events = array();

		$model = new ReservationMachine('search');
		$reservations = $model->search()->getData();
		//conversion en events
		foreach($reservations as $resa){
			//conversion de datetime en format iso yyyy-mm-dd hh:mm:ss vers yyyy-MM-dd'T'HH:mm
			$dateDebut="";
			$dateDebut = strtotime ($resa->start_date);
			$dateDebut = date ('Y-m-d\TH:i', $dateDebut);
			$dateFin=strtotime ($resa->end_date);
			$dateFin = date ('Y-m-d\TH:i', $dateFin);
			$line =array($dateDebut,$dateFin,"machine:".$resa->machine->nom.", user:".$resa->user->nom);
			array_push($events,$line);
		}
		
		$modelt = new Tache('search');
		$taches = $modelt->search()->getData();
		//conversion en events
		foreach($taches as $tache){
			//conversion de datetime en format iso yyyy-mm-dd hh:mm:ss vers yyyy-MM-dd'T'HH:mm
			$dateDebut="";
			$dateDebut = strtotime ($tache->date_limite);
			$dateDebut = date ('Y-m-d\TH:i', $dateDebut);
			$dateFin=strtotime ($tache->date_limite);
			$dateFin = date ('Y-m-d\TH:i', $dateFin);
			$line =array($dateDebut,$dateFin,$tache->nom);
			array_push($events,$line);
		}

		$this->render('planning',array('events'=>$events));
	}
}
