<?php
/* @var $this IncomeController */
/* @var $model Income */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'income-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?> $
		<?php echo $form->error($model,'amount'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'income_type_id'); ?>
		<?php echo $form->dropDownList($model,'income_type_id', CHtml::listData(IncomeType::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id)), 'id', 'name'));?>
		<?php echo $form->error($model,'income_type_id'); ?>
	<a href="<?php echo Yii::app()->createUrl('/IncomeType/create');?>">
	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/Badge-plus.png" width="16px">
	New
	</a>
	
	</div>
	<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>
	 -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',$model->getStatusOptions());?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<!-- 
		<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
	 -->
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'formBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
 
 <script>
$('#Income_amount').priceFormat({
    prefix: '',
    centsSeparator: '.',
    centsLimit: 0,
    thousandsSeparator: ','
});
$( "#income-form" ).submit(function( event ) {
	$('#Income_amount').val($('#Income_amount').unmask());
});
</script>