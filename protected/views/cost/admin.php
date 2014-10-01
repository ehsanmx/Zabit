<?php
/* @var $this CostController */
/* @var $model Cost */

$this->breadcrumbs=array(
	'Costs',
);
?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Costs </a></li>
	
	</ul>
	<div id="tabs-1">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cost-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array('header'=>'Type','value'=>'$data->costType->name'),
		array('header'=>'Amount','value'=>'"$ ".number_format($data->amount)'),
		array('header'=>'Status','value'=>'$data->getStatusOptionsText()'),		
		array('header'=>'Create Date','value'=>'date("Y/m/d H:i:s",strtotime($data->create_date))','htmlOptions'=>array('style'=>'direction:ltr')),
		array('header'=>'User','value'=>'$data->user->name." ".$data->user->family'),
		array(
			'class'=>'CButtonColumn','htmlOptions'=>array('style'=>'width:100px'),
		),
	),
)); ?>
</div></div>
