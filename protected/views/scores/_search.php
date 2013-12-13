<?php
/* @var $this ScoresController */
/* @var $model Scores */
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
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id',array('class'=>'form-control')); ?>
	</div>
<div class="form-group">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id',array('class'=>'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime',array('class'=>'form-control')); ?>
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