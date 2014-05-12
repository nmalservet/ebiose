<h1>Tableau de bord : Collaboration</h1>
<?php 
$arthemes=array('Adobebricks','Algae','Bahamation','BlueDusk','Charged','Chris','Claro','cubanShirts','DesertTom','Distinctive','Harmony','PurpleRain','SageToLime','ThreeD','Tom','Tufte','WatersEdge');
?>
<table height="100%"style="border:1px solid black;">
<?php
$i=0; 
foreach($arthemes as $them){
	echo "<tr><td colspan=\"2\">".$them;
$this->widget('application.widgets.charting.CLineChartWidget', array('id'=>'linechart-'.$i.'-collab','events'=>$events,'theme'=>$them,)); 
	echo "</td><td>";
	$this->widget('application.widgets.charting.CPieChartWidget', array('id'=>'piechart-collab'.$i,'events'=>$events,'theme'=>$them,));
	
	echo "</td></tr>";
$i++;
}
?>
</table>