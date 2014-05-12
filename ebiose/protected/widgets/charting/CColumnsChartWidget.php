<?php
/**
 * CColumnsChartWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * Presentation of chartline using DOJO lib
 * PREREQUIS : mettre dans header le lien de la lib dojo?
 */



class CColumnsChartWidget extends CWidget
{
	
	/**
	 * theme utilisé par dojo, themes possibles: Tom, Claro,Dollar, Harmony, Midwest,Tufte
	 * @var unknown_type
	 */
	public $theme;
	/**
	 * title afficher en dessous du graphe.
	 * @var unknown_type
	 */
	public $title;

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
		if(!isset($this->theme)){
			$this->theme="Claro";
		}
		
		echo "<script>
			
		require([
			 // Require the basic chart class
			\"dojox/charting/Chart\",

			// Require the theme of our choosing
			\"dojox/charting/themes/".$this->theme."\",
			
			// Charting plugins: 

			// 	We want to plot Columns
			\"dojox/charting/plot2d/Columns\",

			// Require the highlighter
			\"dojox/charting/action2d/Highlight\",

			//	We want to use Markers
			\"dojox/charting/plot2d/Markers\",

			//	We'll use default x/y axes
			\"dojox/charting/axis2d/Default\",

			// Wait until the DOM is ready
			\"dojo/domReady!\"
		], function(Chart, theme, ColumnsPlot, Highlight) {

			// Define the data
			var chartData = [10000,9200,11811,12000,7662,13887,14200,12222,12000,10009,11288,12099];
			
			// Create the chart within it's \"holding\" node
			var chart = new Chart(\"".$this->id."\");

			// Set the theme
			chart.setTheme(theme);

			// Add the only/default plot 
			chart.addPlot(\"default\", {
				type: ColumnsPlot,
				markers: true,
				gap: 5
			});
			
			// Add axes
			chart.addAxis(\"x\");
			chart.addAxis(\"y\", { vertical: true, fixLower: \"major\", fixUpper: \"major\" });

			// Add the series of data
			chart.addSeries(\"Monthly Sales\",chartData);
			
			// Highlight!
			new Highlight(chart,\"default\");

			// Render the chart!
			chart.render();
			
		});</script>
 
<div id=\"".$this->id."\" style=\"width:300px;height:200px;\"></div>";
		if(isset($this->title)){
			echo "<div style=\"text-align:center;font-weight:bold;font-style:italic;\">".$this->title."</div>";
		}else{
			echo "<div>Aucun titre</div>";
		}
	}
}
