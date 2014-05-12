<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>Yii::t('common','collaboration'),
		));
		$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>Yii::t('common','dashboard'), 'url'=>array('/collaboration/dashboard')),
						array('label'=>Yii::t('common','news'), 'url'=>array('/news/admin')),
						array('label'=>Yii::t('common','messagerie'), 'url'=>array('/message/admin')),
						array('label'=>Yii::t('common','planning'), 'url'=>array('/collaboration/planning')),
						array('label'=>Yii::t('common','tasks'), 'url'=>array('/tache/admin')),
						array('label'=>Yii::t('common','nonconformites'), 'url'=>array('/nonConformite/admin')),
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