<?php
/* @var $this SportController */
/* @var $model Sport */
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
		<?php echo $form->label($model,'SportName'); ?>
		<?php echo $form->textField($model,'SportName',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton('Search',array( 'class'=>"btn green pull-right")); ?>
        <i class="m-icon-swapright m-icon-white"></i>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->