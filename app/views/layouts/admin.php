<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span3 well" style="padding: 8px 0px">
	<?php $this->widget('bootstrap.widgets.TbMenu', array(
	    'type' => TbHtml::NAV_TYPE_LIST,
	    'items' => array(
		array('label'=>'Menu główne', 'itemOptions'=>array('class'=>'nav-header')),
		TbHtml::menuDivider(),
		array('label'=>'Strony statyczne', 'url'=>array('/pages/admin'), 'icon'=>TbHtml::ICON_FILE),
		TbHtml::menuDivider(),
		array('label'=>'Wyloguj', 'url'=>array('/login/default/logout'), 'icon'=>'off'),
	    ),
	)); ?>
    </div>
    <div class="span9">
	<div id="content">
	    <?php echo $content; ?>
	</div>
    </div>
</div>
<?php $this->endContent(); ?>