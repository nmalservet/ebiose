<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>Yii::t('common','parametrage'),
		));
		$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
						array('label'=>Yii::t('common','dashboard'), 'url'=>array('/parametrage/dashboard')),
						array('label'=>Yii::t('common','listes'), 'url'=>array('/parametrage/listes')),
						array('label'=>Yii::t('common','annotations'), 'url'=>array('/annotation/admin')),
						/*array('label'=>'Référentiels', 'url'=>array('/parametrage/dashboard')),*/
						array('label'=>Yii::t('common','machines'), 'url'=>array('/machine/admin')),
						array('label'=>Yii::t('common','dossiers'), 'url'=>array('/dossier/admin')),
						array('label'=>Yii::t('common','sites'), 'url'=>array('/site/admin')),
						array('label'=>Yii::t('common','transporteurs'), 'url'=>array('/transporteur/admin')),
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