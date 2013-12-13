<?php
/* @var $this ScoresController */
/* @var $model Scores */
/* @var $form CActiveForm */
?>
<!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
--><script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tablednd_0_5.js"></script>

<script>

$(document).ready(function() {
	
	  $("#Scores_category_id").live('change',function(){
	 var categoryval=$('#Scores_category_id').val();
	
			 $.ajax({
				 url: "<?php echo $this->createUrl('/scores/dynamicevent'); ?>",
				 type : 'post',
				 dataType:"json",
				 data : {categoryval:categoryval},
				 success: function(jsondata){
					 $('#Scores_event_id').html(jsondata.data);
					 $('.placeholder').html(jsondata.eventname);
				}
				 });
  });
	  	  
  $("#Scores_event_id").live('change',function(){
	 var eventval=$('#Scores_event_id').val();
	
			 $.ajax({
				 url: "<?php echo $this->createUrl('/scores/eventunitname'); ?>",
				 type : 'post',
				 data : {eventval:eventval},
				 success: function(data){
						$('.placeholder').html(data);
						$('.placeholder1').html(data);
						$('#unitval').val(data);
				}
				 });
  });
  // Initialise the table
    $("#table-1").tableDnD();
});
function clickEvent(obj)
{
  	$(obj).parent().parent().after('<tr class="eventlist1"><td><input type="text" name="Scores[score][]"  class="textbox form-control"/><p class="placeholder1"></p></td><td class="special addbtn"><a href="javascript:void(0)" onclick="clickEvent(this)" class="addone" style="text-decoration: none;">Add Score</a>&nbsp;&nbsp;&nbsp;<a href="#" class="removeme" onclick="removeEvent(this)" style="text-decoration: none;">Delete</a></td></tr>');
 var texboxval=$('.placeholder').html();
 $('.placeholder1').html(texboxval);
 $('#unitval').val(texboxval);
}
function removeEvent(obj)
{
	$(obj).parent().parent().remove();
}

$(document).ready(function() {
  $("a.addone").click(function(){
  	 clickEvent($(this));
	 var texboxval=$('.placeholder').html();
	 $('.placeholder1').html(texboxval);
	  $('#unitval').val(texboxval);
  });
  // Initialise the table
    $("#table-1").tableDnD();
});
</script>
<div class="col-md-8">
<div class="portlet-body form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'scores-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'username'),array('empty'=>'Choose User','class'=>"form-control input-lg",'options' => array($model->user_id=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>
    <?php if($model->isNewRecord) {?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->DropDownList($model,'category_id',CHtml::listData(Categories::model()->findAll(array('order' => 'category ASC')), 'id', 'category'),
                 array('empty'=>'Choose Category',$model->category_id=>'selected','class'=>"form-control input-lg"));?>
        
		<?php echo $form->error($model,'category_id'); ?>
	</div>
    
	<div class="form-group">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->dropDownList($model, 'event_id',array(),array('empty'=>'Choose Event','class'=>"form-control input-lg",'options' => array('empty'=>'Choose Category',$model->event_id=>array('selected'=>true))));
		?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>
    <?php }else{?>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->DropDownList($model,'category_id',CHtml::listData(Categories::model()->findAll(array('order' => 'category ASC')), 'id', 'category'),
                 array('empty'=>'Choose Category','class'=>"form-control input-lg",$model->category_id=>'selected'));?>
        
		<?php echo $form->error($model,'category_id'); ?>
	</div>
    
	<div class="form-group">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->dropDownList($model, 'event_id',CHtml::listData(Events::model()->findAll("category_id='".$model->category_id."'",array('order' => 'eventName ASC')), 'id', 'eventName'),array('empty'=>'Choose Event','class'=>"form-control input-lg",'options' => array('empty'=>'Choose Category',$model->event_id=>array('selected'=>true))));
		?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>
    
    
    <?php }?>
    
	<?php if($model->isNewRecord) {?>
    <div class="form-group">
         <table border="0" id="table-1" cellspacing="5">
			<tr class="eventlist">
				<td >
					<?php echo $form->labelEx($model,'score'); ?>
				</td>
                </tr>
                <tr>
				<td>
					<?php echo $form->textField($model,'score[]',array('class'=>'textbox form-control')); ?>
                <p class="placeholder"></p>
                </td>
                
				<td class="special addbtn">
                	<a href="javascript:void(0)" class="addone" style="text-decoration: none;">Add Score</a>
                </td>
			</tr>
		</table>
        <?php echo $form->error($model,'score'); ?>
        </div>
        <?php echo $form->hiddenField($model,'score1',array('value'=>'','id'=>'unitval'));?>
        <?php }else{?>
        <div class="form-group">
       		 <?php echo $form->labelEx($model,'score'); ?>
			 <?php echo $form->textField($model,'score',array('class'=>'textbox form-control')); ?>
        	 <?php echo $form->error($model,'score'); ?>
             <p class="placeholder"></p>
		</div>
        <?php }?>

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