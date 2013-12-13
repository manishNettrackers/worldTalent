<?php
/* @var $this EventsController */
/* @var $model Events */
/* @var $form CActiveForm */
?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
	  $("#Events_sports_id").change(function(){
	  var sportsval=$('#Events_sports_id').val();
	
			 $.ajax({
				 url: "<?php echo $this->createUrl('/events/dynamiccategory'); ?>",
				 type : 'post',
				 dataType:"json",
				 data : {sportsval:sportsval},
				 success: function(jsondata){
					 $('#Events_category_id').html(jsondata.data);
				   }
				 });
  });
});
</script>
<div class="col-md-8">
<div class="portlet-body form">

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
<?php if($model->isNewRecord) {?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'sports_id'); ?>
		<?php echo 
		$form->DropDownList($model,'sports_id',CHtml::listData(Sport::model()->findAll(array('order' => 'SportName ASC')), 'id', 'SportName'),
                 array('empty'=>'Choose Sport',$model->sports_id=>'selected','class'=>"form-control input-lg"));?>
		<?php echo $form->error($model,'sports_id'); ?>
	</div>
    
  <div class="form-group">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', array(),array($model->category_id=>'selected','class'=>"form-control input-lg"));  ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>
<?php }else{?>

<div class="form-group">
		<?php echo $form->labelEx($model,'sports_id'); ?>
		<?php echo $form->dropDownList($model,'sports_id', CHtml::listData(Sport::model()->findAll(array('order' => 'SportName ASC')), 'id', 'SportName'), array('empty'=>'Choose Sport',$model->sports_id=>'selected','class'=>"form-control input-lg"));  ?>
		<?php echo $form->error($model,'sports_id'); ?>
	</div>

<div class="form-group">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', CHtml::listData(Categories::model()->findAll(array('order' => 'category ASC')), 'id', 'category'),array($model->category_id=>'selected','class'=>"form-control input-lg"));  ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>
<?php }?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'eventName'); ?>
		<?php echo $form->textField($model,'eventName',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'eventName'); ?>
	</div>
    
  
	<div class="form-group">
		<?php echo $form->labelEx($model,'unitid'); ?>
		<?php echo $form->dropDownList($model,'unitid', CHtml::listData(Units::model()->findAll(array('order' => 'unitName ASC')), 'id', 'unitName'), array('empty'=>'Choose Unit',$model->unitid=>'selected','class'=>"form-control input-lg"));?>
		<?php echo $form->error($model,'unitid'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class'=>"form-control")); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array( 'class'=>"btn green pull-right")); ?>
         <i class="m-icon-swapright m-icon-white"></i>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->