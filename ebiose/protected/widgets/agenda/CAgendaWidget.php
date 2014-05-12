<?php
/**
 * CAgendaWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * Presentation of AGenda using DOJO lib
 * PREREQUIS : mettre dans header le lien de la lib dojo?
 */



class CAgendaWidget extends CWidget
{

	/**
	 * $events is an array of array to store events
	 * an event is an array of startDate, endDate, title
	 * date are in the standard format "yyyy-MM-dd'T'HH:mm"
	 * example : 2012-01-01T12:00
	 * @var unknown
	 */
	public $events=array();

	public function init()
	{
		parent::init();

	}


	/**
	 * TODO inclure la declaration du css js pour dojo ici plutot que dans
	 */

	/**
	 * NOTES :
	 * dateInterval : day, week, month ( vue par jour, semaine mois du calendrier)
	 */
	public function run()
	{
		echo "<div style=\"background:white;color:black;\">";
		//inclusion de data
		echo "<script>";
		//decodage des events passés
		echo "var someData = [";
		for ($i = 0; $i < count($this->events); $i++) {
			//one event = 3 parameters
			if($i>0){
				echo ",";
			}
			echo "{id:".$i.",
			summary:\"".$this->events[$i][2]."\",
			startTime:\"".$this->events[$i][0]."\",
			endTime:\"".$this->events[$i][1]."\"
		}";
		}
		echo "];";
		echo "		require([\"dojo/parser\", \"dojo/ready\", \"dojox/calendar/Calendar\",\"dojo/_base/Deferred\", \"dojo/store/Observable\",
				\"dojo/store/Memory\", \"dojo/date/stamp\"],
				function(parser, ready,Calendar, Deferred, Observable, Memory, stamp){
				ready(function(){
				calendar = new Calendar({
				dateInterval: \"week\",
				decodeDate : function(s) {
				return stamp.fromISOString(s);
	},
				encodeDate : function(d) {
				return stamp.toISOString(d);
	},
				columnViewProps : {
				minHours : 8,
				maxHours : 20,
				hourSize : 40
	},
				store: new Observable(new Memory({data: someData})),
				style: \"position:relative;width:100%;height:600px;\"
	}, \"someId\");
	}
				)}
				);</script>";
		echo "<div id=\"someId\"></div>";
		echo "</div>";

	}
}
