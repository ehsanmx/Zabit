<?php
/* @var $this IncomeTypeController */
/* @var $model IncomeType */

$this->breadcrumbs=array(
	'Cost Types'=>array('list'),
	$model->name,
);


?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">View Type</a></li>
	
	</ul>
	<div id="tabs-1">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
	),
)); ?>
</div></div>