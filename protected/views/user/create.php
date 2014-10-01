<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'ثبت کاربر',
);

?>
<div align="center">
<div id="tabs" style="width: 40%;margin-top: 50px" align="right">
	<ul>
		<li><a href="#tabs-1">Register</a></li>	
	</ul>
	<div id="tabs-1">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>
</div>
<script>
	function getMenu(){
		return true;
	}
</script>