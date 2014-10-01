<?php
/* @var $this CostTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cost Types',
);

?>

<h1>Cost Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
