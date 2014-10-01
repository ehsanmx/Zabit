<link rel="stylesheet" type="text/css" href="/zabit/themes/zabit/gridview/styles.css" />
<link rel="stylesheet" type="text/css" href="/zabit/themes/zabit/pager.css" />
<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs=array(
	$model->name,
);

?>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Account Information</a></li>
	
	</ul>
	<div id="tabs-1">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		array('name'=>'Balance','value'=>"$ ".number_format($model->balance),'htmlOptions'=>array('style'=>'direction:rtl')),
		array('name'=>'Credit','value'=>"$ ".number_format($model->extra),'htmlOptions'=>array('style'=>'direction:rtl')),
		array('name'=>'Budget','value'=>"$ ".number_format($model->budget),'htmlOptions'=>array('style'=>'direction:rtl')),
	),
)); ?>
<?php 
$accountItems = AccountItem::model()->findAllByAttributes(array('account_id'=>$model->id));
$debts=0;
$credit=0;
?>
		<div id="account-grid" class="grid-view">
			<table class="items">
				<thead>
					<tr>
						<th>Description</th>
						<th>Debts</th>
						<th>Creditor</th>
						<th>Date</th>
					</tr>
				<thead>
					<?php foreach($accountItems as $item){
						$debts+=$item->debtor;
						$credit+=$item->creditor;
					if($item->debtor==0){?>
					<tr class="even" style="color: green">
						<td><?php echo $item->description;?></td>
						<td><?php echo $item->debtor;?></td>
						<td><?php echo number_format($item->creditor);?>+</td>
						<td><?php echo date("H:i:s Y/m/d",strtotime($item->create_date));?></td>
					</tr>
					<?php }else{?>
					<tr class="odd" style="color: red">
						<td><?php echo $item->description;?></td>
						<td><?php echo number_format($item->debtor);?>-</td>
						<td><?php echo $item->creditor;?></td>
						<td><?php echo date("H:i:s Y/m/d",strtotime($item->create_date));?></td>
					</tr>
					<?php }}?>
					<tr style="background-color: #ddd">
						<td><b>Total</b></td>
						<td><b>$ <?php echo number_format($debts);?></b></td>
						<td><b>$ <?php echo number_format($credit);?></b></td>
						<td><b>Current Balance: $ <?php echo number_format($model->balance);?></b></td>
					</tr>			
			</table>
		</div>
	</div></div>