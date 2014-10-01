<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/dcaccordion.css" />

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/start/jquery-ui-1.10.0.custom.css" />
	
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!-- <script type='text/javascript'
	src='<?php //echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.js'></script>	-->
<script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js'></script>
<script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.blockUI.js'></script>

<!-- <script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.0.custom.js'></script>
 -->	
<script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.cookie.js'></script>
<script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/calendar.js'></script>
<script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dcjqaccordion.2.7.min.js'></script>

<link rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/tinydropdown.css"
	type="text/css" />
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/tinydropdown.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.price.js"></script>	
	
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/skins/grey.css" />
<script type='text/javascript'
	src='<?php echo Yii::app()->request->baseUrl; ?>/js/menu_jquery.js'></script>
<link rel='stylesheet' type='text/css'
	href='<?php echo Yii::app()->request->baseUrl; ?>/css/styles2.css' />
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
    function number_format(number, decimals, dec_point, thousands_sep) {
        var n = !isFinite(+number) ? 0 : +number, 
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }    
</script>
</head>

<body>
<div style="position: absolute;left: 1%;top: 10px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/zlogo_eng.png"></img></div>
<div class="container" id="page">
 <!-- 
	<div id="header">
		<div id="logo"></div>
	</div>
-->
	<!-- header -->
<!-- 
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
	 -->
	<!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>
 
	<!-- footer -->

</div><!-- page -->
	<div id="footer">
Copyright &copy; <?php echo date('Y'); ?> by EhsanMx.<br/>
		All Rights Reserved. 
		</div>

<!-- 
<div style="position: absolute;left: 2%;top: 85%;color: #ddd;direction: ltr">
Copyright &copy; <?php echo date('Y'); ?> by Diamond Group.<br/>
		All Rights Reserved. 
</div>
 -->
</body>		
</html>
