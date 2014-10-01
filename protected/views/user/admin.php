<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users',
);
?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Users</a></li>
	
	</ul>
	<div id="tabs-1">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'username',
		'password',
		'name',
		'family',
		'status',
		'email',
		'phone',
		'lock',
		'premium_code',

		array(
			'class'=>'CButtonColumn','htmlOptions'=>array('style'=>'width:100px'),
		),
	),
)); ?>
</div></div>
