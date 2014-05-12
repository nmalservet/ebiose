<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>Yii::t('common','projets'),
		));
		$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>Yii::t('common','dashboard'), 'url'=>array('/projet/dashboard')),
						array('label'=>Yii::t('common','analyses'), 'url'=>array('/analyse/admin')),
						array('label'=>Yii::t('common','resultats'), 'url'=>array('/parametrage/dashboard')),
						array('label'=>Yii::t('common','catalogues'), 'url'=>array('/catalogue/admin')),
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