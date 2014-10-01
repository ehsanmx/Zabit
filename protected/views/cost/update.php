<?php
/* @var $this CostController */
/* @var $model Cost */

$this->breadcrumbs=array(
	'Costs'=>array('list'),
	"$ ".$model->amount=>array('view','id'=>$model->id),
	'Edit',
);

?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Edit Cost</a></li>
	
	</ul>
	<div id="tabs-1">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div></div>