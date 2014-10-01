<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<table style="border: 0px solid #000; width: 100%">
<tr style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/h_line_bg.gif');background-repeat: repeat-x; background-position: bottom;">
<td colspan="2">
<table style="padding: 0px;margin: 0px;"><tr>
<td style="text-align: right;width: 36px"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/User.png" width="36px"></td>
<td style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/v_line_bg.gif');background-repeat: repeat-y; background-position: left;width: 1px"></td>
<td style="text-align: left;font-size: 14px;text-shadow: 0px 1px 0px rgba(255, 255, 255, 1);"> <b><?php if(!Yii::app()->user->isGuest){ $user = User::model()->findByPk(Yii::app()->user->id); echo $user->name." ".$user->family;} ?></b>, Welcome to Zabit!</td>
<td></td>
<td style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/v_line_bg.gif');background-repeat: repeat-y; background-position: center;width: 2px"></td>
<td style="text-align: center;width: 36px"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Calender Month.png" width="36px"></td>
<td style="text-align: left;font-size: 13px;width: 180px"><?php echo date("l d F Y");?></td>
<td style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/v_line_bg.gif');background-repeat: repeat-y; background-position: center;width: 2px"></td>
<td style="text-align: center;width: 36px"><a href="<?php echo Yii::app()->createUrl('/user/update/id/'.Yii::app()->user->id);?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Tools.png" width="36px"><br>Setting</a></td>
<td style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/v_line_bg.gif');background-repeat: repeat-y; background-position:center;;width: 2px"></td>
<td style="text-align: center;width: 39px;padding-left: 15px"><a href="<?php echo Yii::app()->createUrl('/site/logout');?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Power.png" width="36px"><br>Exit</a></td>
</tr></table>
</td>
</tr>
	<tr>
		<td style="vertical-align: top;"><div class="span-5 last"
				style="border: 0px solid #000; width: 100%" align="left">
	<div id="sidebar">	
		<?php
				$dir = 'background-size:26px 26px;background-repeat: no-repeat;background-position: 5px;';
		?>
	<div id='cssmenu'>
			<ul>
				<li class="active"><a id="home" href='<?php echo Yii::app()->request->baseUrl; ?>' style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/icons/home.png');<?php echo $dir;?>;">Home</a>
				</li>
				<li class="has-sub"><a id="income" href='index.php' style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Cash.png');<?php echo $dir;?>;"><span>Income</span></a>
					<ul>
						<li><a href="<?php echo Yii::app()->createUrl('/income/create')?>">New Income</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('/income/list')?>">Incomes</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('/incomeType/list')?>">Income Types</a></li>						
					</ul>
				</li>
				<li class="has-sub"><a id="cost" href='index.php' style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Billing.png');<?php echo $dir;?>;"><span>Costs</span></a>
					<ul>
						<li><a href="<?php echo Yii::app()->createUrl('/cost/create')?>">New Cost</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('/cost/list')?>">Costs</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('/costType/list')?>">Cost Types</a></li>
					</ul>
				</li>
				<li class="has-sub"><a id="account" href='index.php' style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Shleves.png');<?php echo $dir;?>;"><span>Account</span></a>
					<ul>
						<li><a href="<?php echo Yii::app()->createUrl('/account/view/id/'.Yii::app()->user->id);?>">Account</a></li>
					</ul>
				</li>
				
				<li class="has-sub"><a id="purchasing" href='index.php' style="background-image: url('<?php echo Yii::app()->request->baseUrl; ?>/images/icons/basket.png');<?php echo $dir;?>;"><span>Help</span></a>
					<ul>
						<li><a href="#">Help</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- sidebar -->
</div>
</td>
		<td width="85%" style="vertical-align: top">
		<div style="width: 100%" align="left">
				<div class="span-19" style="border: 0px solid #000; width: 100%;">
				
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Home', Yii::app()->homeUrl),
			'htmlOptions'=>array('style'=>'border-radius:4px;background-color:white;font-size:12px;padding:10px;margin:5px;width:96%;border: 1px dashed #ccc;'),
		)); ?><!-- breadcrumbs -->
	<?php endif?>
				
					<div id="content">
						<?php echo $content; ?>
					</div>

					<!-- content -->
				</div>
			</div></td>
	</tr>
</table>
<?php $this->endContent(); ?>
<script>
function setMenu(id){
	 $.ajax({
		    type: 'GET',
		    data:"id="+id,
		     url: '<?php echo Yii::app()->createUrl("site/setMenu"); ?>',
		 	success:function(data){
		               },
		    error: function(data) { 
		     },  
		   dataType:'json'
		   });
}
function getMenu(){
	 $.ajax({
		    type: 'GET',
		    url: '<?php echo Yii::app()->createUrl("site/getMenu"); ?>',
		 	success:function(data){
				t=data.id;
				if(t!='home'){
			 		var checkElement_test = $('#'+t).next();
			 		checkElement_test.show();
				}		 					
		               },
		    error: function(data) { 
		     },  
		   dataType:'json'
		   });
}
</script>