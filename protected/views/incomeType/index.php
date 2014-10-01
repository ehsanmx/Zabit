<?php
/* @var $this IncomeTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Income Types',
);

$this->menu=array(
	array('label'=>'Create IncomeType', 'url'=>array('create')),
	array('label'=>'Manage IncomeType', 'url'=>array('admin')),
);
?>

<h1>Income Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
