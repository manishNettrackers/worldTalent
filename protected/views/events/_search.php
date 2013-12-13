<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>
<div class="col-md-8">
<div class="portlet-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="form-group">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'sports_id'); ?>
		<?php echo $form->textField($model,'sports_id',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'eventName'); ?>
		<?php echo $form->textField($model,'eventName',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'unitid'); ?>
		<?php echo $form->textField($model,'unitid',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton('Search',array( 'class'=>"btn green pull-right")); ?>
        <i class="m-icon-swapright m-icon-white"></i>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->