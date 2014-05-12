<h1>Tableau de bord : Biobank</h1>

<table height="100%"style="border:1px solid black;"><tr><td>
<?php $this->widget('application.widgets.charting.CPieChartWidget', array('id'=>'piechart-collab','events'=>$events,'theme'=>'Distinctive','title'=>'Répartition des échantillons par type',)); ?>

</td><td>
<?php $this->widget('application.widgets.charting.CLineChartWidget', array('id'=>'linechart2-collab','events'=>$events,'theme'=>'Distinctive','title'=>'Evolution du nombre de prélèvements')); ?>
</td></tr>
<tr><td>
<?php  $this->widget('application.widgets.charting.CColumnsChartWidget', array('id'=>'columnchart-collab','events'=>$events,'theme'=>'Distinctive','title'=>'Nombre d\'échantillons par mois')); ?>
</td><td>
</td></tr>
</table>