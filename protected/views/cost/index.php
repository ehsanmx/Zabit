<?php
/* @var $this CostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Costs',
);

$this->menu=array(
	array('label'=>'Create Cost', 'url'=>array('create')),
	array('label'=>'Manage Cost', 'url'=>array('admin')),
);
?>

<h1>Costs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
