<?php
/* @var $this IncomeController */
/* @var $model Income */

$this->breadcrumbs=array(
	'New Income',
);

?>


<div id="tabs">
	<ul>
		<li><a href="#tabs-1">New Income </a></li>
	
	</ul>
	<div id="tabs-1">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>