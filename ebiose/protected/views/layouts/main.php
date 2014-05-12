<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="fr" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<!-- ebiose -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ebiose.css" />
	<title>ebiose</title>

<script>
	dojoConfig = {
		parseOnLoad : true
	}
</script>
<!-- if you want o include dojo locally add this line and comment the other using cdn yandex -->
<!--<script src='<?php echo Yii::app()->request->baseUrl; ?>/js/dojo/dojo.js'></script>-->
<!--
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/dijit/themes/claro/claro.css">
	<link rel="stylesheet"
		href="<?php echo Yii::app()->request->baseUrl; ?>/js/dojox/calendar/themes/claro/Calendar.css">
-->
<!-- dojo style -->
<link rel="stylesheet" href="//yandex.st/dojo/1.9.1/dojo/../dijit/themes/claro/claro.css">
<link rel="stylesheet" href="//yandex.st/dojo/1.9.1/dojo/../dojox/calendar/themes/claro/Calendar.css">
    <script>dojoConfig = {parseOnLoad: true}</script>
<script src="//yandex.st/dojo/1.9.1/dojo/dojo.js"></script>

<script src='<?php echo Yii::app()->request->baseUrl; ?>/js/ebiose.js'></script>
</head>

<body class="claro">

<div class="container" id="page">
	<div id="header">
		<div id="logo">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_ebiose_essai_contour3D_blue_grid_comicsansms.png" />
		<div style="float: right;width:40px;">
			<?php 
			$arlang=array('fr','en');
			foreach ($arlang as $langue){
				echo "<a style=\"margin-left:3px;\" href=\"./index.php?r=";
				echo $this->uniqueid."/".$this->action->Id;
				echo "&lang=".$langue."\">";
				echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$langue.'.png');
				echo "</a>";
			}
			?>			
			</div>
		</div>
		
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
				'encodeLabel'=>false,
				
			'items'=>array(
				array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/house.png" /> '.Yii::t('common','accueil'), 'url'=>array('/main/index')),
				array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/chart_organisation.png" />'.Yii::t('common','biobank'), 'url'=>array('/biobank/dashboard')),
					//array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/bug.png" />ZooBiobank', 'url'=>array('/zoobiobank/dashboard')),
					array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/database.png" />'.Yii::t('common','storage'), 'url'=>array('/stockage/dashboard')),
					array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/box.png" />'.Yii::t('common','projets'), 'url'=>array('/projet/dashboard')),
					array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/group.png" />'.Yii::t('common','collaboration'), 'url'=>array('/collaboration/dashboard')),
					array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/wrench_orange.png" />'.Yii::t('common','parametrage'), 'url'=>array('/parametrage/dashboard')),
					array('label'=>'<img class="image-main-menu" src="'.Yii::app()->request->baseUrl.'/images/monitor.png" />'.Yii::t('common','administration'), 'url'=>array('/administration/dashboard')),
				array('label'=>Yii::t('common','seconnecter'), 'url'=>array('/main/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('common','sedeconnecter').' ('.Yii::app()->user->name.')', 'url'=>array('/main/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php
			$flashMessages = Yii::app()->user->getFlashes();
			if ($flashMessages) {
			    foreach($flashMessages as $key => $message) {
			        echo '<br><div class="flash-' . $key . '">' . $message . "</div>";
			    }
			}
		?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Version 2.1 Copyright &copy; <?php echo date('Y'); ?> by BiosoftwareFactory.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
