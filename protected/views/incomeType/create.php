<?php
/* @var $this IncomeTypeController */
/* @var $model IncomeType */

$this->breadcrumbs=array(
	'New Type',
);
?>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">New Type</a></li>
	
	</ul>
	<div id="tabs-1">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>