<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	$model->name,
);

?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">User Information </a></li>
	
	</ul>
	<div id="tabs-1">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		array('name'=>'password','value'=>'[Cannot be displayed]'),
		'name',
		'family',
		'status',
		'email',
		'phone',
		'lock',
		'premium_code',
	),
)); ?>
</div></div>