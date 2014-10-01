<?php
/* @var $this CostTypeController */
/* @var $model CostType */

$this->breadcrumbs=array(
	'Cost Types'=>array('list'),
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