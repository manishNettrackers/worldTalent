<?php
/* @var $this SportController */
/* @var $model Sport */
/* @var $form CActiveForm */
?>
<div class="col-md-8">
<div class="portlet-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'SportName'); ?>
		<?php echo $form->textField($model,'SportName',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'SportName'); ?>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array( 'class'=>"btn green pull-right")); ?>
        <i class="m-icon-swapright m-icon-white"></i>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->