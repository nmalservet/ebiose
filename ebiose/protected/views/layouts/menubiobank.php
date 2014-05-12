<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Biobank',
		));
		$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>Yii::t('common','dashboard'), 'url'=>array('/projet/dashboard')),
						array('label'=>Yii::t('common','patients'), 'url'=>array('/patient/admin')),
						array('label'=>Yii::t('common','prelevements'), 'url'=>array('/prelevement/admin')),
						array('label'=>Yii::t('common','echantillons'), 'url'=>array('/echantillon/admin')),
						array('label'=>Yii::t('common','cessions'), 'url'=>array('/cession/admin')),
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