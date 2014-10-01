<?php
/* @var $this IncomeController */
/* @var $model Income */

$this->breadcrumbs=array(
	'Incomes'=>array('list'),
	"$ ".$model->amount=>array('view','id'=>$model->id),
	'Edit',
);
?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Income Edit</a></li>
	
	</ul>
	<div id="tabs-1">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>