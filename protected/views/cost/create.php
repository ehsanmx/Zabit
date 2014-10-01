<?php
/* @var $this CostController */
/* @var $model Cost */

$this->breadcrumbs=array(
	'New Cost',
);
?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">New Cost</a></li>
	
	</ul>
	<div id="tabs-1">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>