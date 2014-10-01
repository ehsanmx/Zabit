<?php
/* @var $this IncomeTypeController */
/* @var $model IncomeType */

$this->breadcrumbs=array(
	'Income Types'=>array('list'),
	$model->name=>array('view','id'=>$model->id),
	'Edit',
);

?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Edit Type </a></li>
	
	</ul>
	<div id="tabs-1">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>