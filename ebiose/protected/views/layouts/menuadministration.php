<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>Yii::t('common','administration'),
		));
		$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>Yii::t('common','dashboard'), 'url'=>array('/administration/dashboard')),
						array('label'=>Yii::t('common','users'), 'url'=>array('/user/admin')),
						array('label'=>Yii::t('common','profils'), 'url'=>array('/profil/admin')),
						array('label'=>Yii::t('common','droits'), 'url'=>array('/parametrage/dashboard')),
						array('label'=>Yii::t('common','collections'), 'url'=>array('/collection/admin')),
						array('label'=>Yii::t('common','logs'), 'url'=>array('/logActivity/admin')),
						array('label'=>Yii::t('common','modules'), 'url'=>array('/module/admin')),
						array('label'=>Yii::t('common','options'), 'url'=>array('/administration/options')),
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