<?php

// echo "compte:".count($events)."<br>";
// foreach($events as $event){
// 	echo "debut:".$event[0].",fin:".$event[1]."<br>";
// }


?>
<div style="background:#EFFDFF;margin:5px;padding-right: 10px;">
				<?php  	
				$image = CHtml::image('./images/calendar_add.png', 'Ajouter une réservation');
				echo CHtml::link($image.'Ajouter une réservation', array('/reservationMachine/create'));
				?>
			</div>
<?php $this->widget('application.widgets.agenda.CAgendaWidget', array('id'=>'reservation-agenda','events'=>$events,)); ?>
