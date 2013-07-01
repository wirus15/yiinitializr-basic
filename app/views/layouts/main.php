<?php
/**
 *
 * main.php layout
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js"> <!--<![endif]-->
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?= $this->pageTitle; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?= Yii::app()->baseUrl; ?>/css/style.css">
    </head>
    
    <body>
	<div id="wrap">
	    <div class="container-fluid">
		<nav id="main-menu">
		    <? $this->widget('bootstrap.widgets.TbNavbar', array(
			'brand' => Yii::app()->name,
			'fixed' => false,
			'items' => array(
			    array(
				'class' => 'bootstrap.widgets.TbMenu',
				'htmlOptions' => array('class' => 'pull-right'),
				'items' => array(
				    array(
					'label' => 'Zaloguj', 
					'url' => array('/login/default/login'), 
					'visible' => Yii::app()->user->isGuest,
					'icon' => TbHtml::ICON_USER,
				    ),
				    array(
					'label' => 'Wyloguj', 
					'url' => array('/login/default/logout'), 
					'visible' => !Yii::app()->user->isGuest,
					'icon' => TbHtml::ICON_OFF,
				    ),
				),
			    ),
			),
		    )); ?>
		</nav>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
		    'links'=>$this->breadcrumbs,
		)); ?>
		<?= $content; ?>
	    </div>
	    <div id="push"></div>
	</div>

	<footer id="footer">
	    <div class="container">
		<div class="credit">Copyright &copy;
		    <?= date('Y'); ?>
		    by <?= Yii::app()->name; ?>. All Rights Reserved.
		</div>
	    </div>
	</footer>
    </body>
</html>