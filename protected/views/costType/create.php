<?php
/* @var $this CostTypeController */
/* @var $model CostType */

$this->breadcrumbs=array(
	'New Cost Type',
);

?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">New Cost Type </a></li>
	
	</ul>
	<div id="tabs-1">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>