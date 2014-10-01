<head>


	<!-- General meta information -->
	<title>Login Form by Oussama Afellad</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="index, follow" />
	<meta charset="utf-8" />
	<!-- // General meta information -->
	
	
	<!-- Load Javascript -->
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.query-2.1.7.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/rainbows.js"></script>
	<!-- // Load Javascipt -->

	<!-- Load stylesheets -->
	<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login_style.css" media="screen" />
	<!-- // Load stylesheets -->
	
<script>


	$(document).ready(function(){
 
	$("#submit1").hover(
	function() {
	$(this).animate({"opacity": "0"}, "slow");
	},
	function() {
	$(this).animate({"opacity": "1"}, "slow");
	});
 	});


</script>
	
</head>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div id="wrapper">
	<div class="form">
		<?php echo $form->errorSummary($model); ?>
		</div>	
		<div id="wrappertop">
				<div align=left style="padding-left:250px;padding-top:24px;font-size: 20px;text-shadow: #fff 2px 2px 2px;font-family:Myriad Pro;font-weight: bold;">
			<a href="<?php echo Yii::app()->createUrl('/user/create')?>" style="color: #000">Register!</a>
			</div>					
		
		</div>
		<div id="wrappermiddle">

			<h2>Sign in</h2>
			<div id="username_input">
				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">
				
					<input type="text" name="LoginForm[username]" id="url" value="Username" onclick="this.value = ''">
<!-- 					<img id="url_user" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mailicon.png" alt=""> -->
				
				</div>
				<div id="username_inputright"></div>

			</div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
				
					<input type="password" name="LoginForm[password]" id="url" value="password" onclick="this.value = ''">
	<!-- 				<img id="url_password" src="<?php echo Yii::app()->request->baseUrl; ?>/images/passicon.png" alt=""> -->				
				</div>

				<div id="password_inputright"></div>
			</div>

			<div id="submit">
				<form>
				<input type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/submit_hover.png" id="submit1" value="Sign In">
				<input type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/submit.png" id="submit2" value="Sign In">
				</form>
			</div>


			<div id="links_left">

			<a href="#">Forgot Password?</a>

			</div>

 			<div id="links_right">
 				<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
 			</div> 			
<?php $this->endWidget(); ?>
		</div>

		<div id="wrapperbottom">
		</div>
		
		<div id="powered">
<!-- <p>Powered by <a href="http://www.premiumfreebies.eu">Premiumfreebies Control Panel</a></p> -->		
		</div>
	</div>
	<script>
		function getMenu(){
			return true;
		}
	</script>