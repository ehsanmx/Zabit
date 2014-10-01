<?php
/* @var $this CostController */
/* @var $model Cost */

$this->breadcrumbs=array(
	'Costs'=>array('list'),
	"$ ".$model->amount,
);

?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">View Cost</a></li>
	
	</ul>
	<div id="tabs-1">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'Type','value'=>$model->costType->name),
		array('name'=>'Amount','value'=>"$ ".number_format($model->amount)),
		array('name'=>'Status','value'=>$model->getStatusOptionsText()),
		array('name'=>'Create Date','value'=>date("H:i:s Y/m/d",strtotime($model->create_date)),'htmlOptions'=>array('style'=>'direction:ltr')),
		array('name'=>'User','value'=>$model->user->name." ".$model->user->family),
		'description',			
	),
)); ?>

</div></div>