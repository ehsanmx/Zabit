<?php
/* @var $this IncomeTypeController */
/* @var $model IncomeType */

$this->breadcrumbs=array(
	'Income Types',
);

?>


<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Income Types</a></li>
	
	</ul>
	<div id="tabs-1">
	<div>
	<a href="<?php echo Yii::app()->createUrl('/IncomeType/create');?>">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Badge-plus.png" width="16px">
	New
	</a>
	</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'income-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		array(
			'class'=>'CButtonColumn','htmlOptions'=>array('style'=>'width:100px'),
		),
	),
)); ?>
</div></div>