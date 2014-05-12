<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'ZooBiobank',
		));
		$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>'Tableau de bord', 'url'=>array('/projet/dashboard')),
						array('label'=>'Animaux', 'url'=>array('/parametrage/dashboard')),
						array('label'=>'Echantillons', 'url'=>array('/parametrage/dashboard')),
						array('label'=>'Produits dérivés', 'url'=>array('/parametrage/dashboard')),
						array('label'=>'Cession', 'url'=>array('/parametrage/dashboard')),
				),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<?php $this->endContent(); ?>