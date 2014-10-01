<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Setting',
);
?>


<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Update User Information </a></li>
	
	</ul>
	<div id="tabs-1">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>