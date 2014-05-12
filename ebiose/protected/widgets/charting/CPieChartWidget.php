<?php
/**
 * CPieChartWidget class file.
 *
 * @author Malservet Nicolas <n.malservet@biosoftwarefactory.com>
 * @link http://www.biosoftwarefactory.com/
 * @copyright Copyright &copy; 2012 BioSoftware Factory
 *
 * Presentation of AGenda using DOJO lib
 * PREREQUIS : mettre dans header le lien de la lib dojo?
 */



class CPieChartWidget extends CWidget
{

	/**
	 * theme utilisé par dojo, themes possibles: Tom, Claro, 
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
			//echo "pas de theme";
		}
		//echo "theme:".$this->theme;
		//echo "id:".$this->id;
		
		echo "<script>
require([
     // Require the basic chart class
    \"dojox/charting/Chart\",
 
    
    // Require the theme of our choosing
    \"dojox/charting/themes/".$this->theme."\",
 
    // Charting plugins:
 
    //  We want to plot a Pie chart
    \"dojox/charting/plot2d/Pie\", 
 
    // Retrieve the Legend, Tooltip, and MoveSlice classes
    \"dojox/charting/action2d/Tooltip\",
    \"dojox/charting/action2d/MoveSlice\",
 
    //  We want to use Markers
    \"dojox/charting/plot2d/Markers\",
 
    
    //legend
    \"dojox/charting/widget/Legend\",
 
    // Wait until the DOM is ready
    \"dojo/domReady!\"
], function(Chart, theme, Pie, Tooltip, MoveSlice) {
 
    
    // Create the chart within it's \"holding\" node
    var mychart = new Chart(\"".$this->id."\");
 
    // Set the theme
    mychart.setTheme(theme);
 
    // Add the only/default plot
    mychart.addPlot(\"default\", {
        type: Pie,
        markers: true,
        radius: 80
    });
    
   
     // Add the series of data
    // Define the data
    //var chartData = [10000,9200,11811,12000,7662,13887,14200,12222,12000,10009,11288,12099];
    // mychart.addSeries(\"Monthly Sales - 2010\",chartData);
    mychart.addSeries(\"Series A\", [
        {y: 4, text: \"Cellules\",   stroke: \"black\", tooltip: \"Red is 50%\"},
        {y: 2, text: \"ADN\", stroke: \"black\", tooltip: \"Green is 25%\"},
        {y: 1, text: \"Serum\",  stroke: \"black\", tooltip: \"I am feeling Blue!\"},
        {y: 1, text: \"Plasma\", stroke: \"black\", tooltip: \"Mighty <strong>strong</strong><br>With two lines!\"}
    ]);
 
    // Create the tooltip
    var tip = new Tooltip(mychart,\"default\");
 
    // Create the slice mover
    var mag = new MoveSlice(mychart,\"default\");
 
    // Render the chart!
    mychart.render();
 
});
</script>
 
<div id=\"".$this->id."\" style=\"width:300px;height:200px;\"></div>
		<div id=\"".$this->id."-legend\"></div>
		";
		if(isset($this->title)){
			echo "<div style=\"text-align:center;font-weight:bold;font-style:italic;\">".$this->title."</div>";
		}else{
			echo "<div>Aucun titre</div>";
		}

	}
}
