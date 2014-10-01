<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
));
?>

	<?php echo $form->errorSummary($model); ?>
	
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'family'); ?>
		<?php echo $form->textField($model,'family',array('size'=>50,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'family'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50,'value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
       <?php
                CHtml::$afterRequiredLabel = '<span style="color:red">*</span>';
                echo CHtml::activeLabelEx($model,'password_repeat');
                ?>
	       <?php echo $form->passwordField($model,'password_repeat',array('size'=>50,'maxlength'=>256)); ?>
	       <?php echo $form->error($model,'password_repeat'); ?>
	</div>
	
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Register' : 'Save',array('class'=>'formBtn')); ?>
		<input type="button" value="Back" onclick="window.location='<?php echo Yii::app()->request->baseUrl; ?>'">
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->