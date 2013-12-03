<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sports_id'); ?>
		<?php echo $form->dropDownList($model,'sports_id', CHtml::listData(Sport::model()->findAll(array('order' => 'SportName ASC')), 'id', 'SportName'), array('empty'=>'Choose Sport',$model->sports_id=>'selected'));  ?>
		<?php echo $form->error($model,'sports_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eventName'); ?>
		<?php echo $form->textField($model,'eventName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'eventName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unitid'); ?>
		<?php echo $form->dropDownList($model,'unitid', CHtml::listData(Units::model()->findAll(array('order' => 'unitName ASC')), 'id', 'unitName'), array('empty'=>'Choose Unit',$model->unitid=>'selected'));?>
		<?php echo $form->error($model,'unitid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->