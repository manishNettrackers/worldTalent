<?php
/* @var $this ScoresController */
/* @var $model Scores */
/* @var $form CActiveForm */
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tablednd_0_5.js"></script>

<script>
function clickEvent(obj)
{
  	$(obj).parent().parent().after('<tr class="eventlist1"><td><input type="text" name="Scores[score][]"  class="textbox" placeholder="_ _:_ _ _ _" /></td><td class="special addbtn"><a href="#" onclick="clickEvent(this)" class="addone" style="text-decoration: none;">Add Score</a>&nbsp;&nbsp;&nbsp;<a href="#" class="removeme" onclick="removeEvent(this)" style="text-decoration: none;">Delete</a></td></tr>');

}
function removeEvent(obj)
{
	$(obj).parent().parent().remove();
}

$(document).ready(function() {
  $("a.addone").click(function(){
  	clickEvent($(this));
  });
  // Initialise the table
    $("#table-1").tableDnD();
});
</script>
<div class="form">

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

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'username'),array('empty'=>'Choose User','options' => array($model->user_id=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->dropDownList($model, 'event_id', CHtml::listData(Events::model()->findAll(), 'id', 'eventName'),array('empty'=>'Choose Event','options' => array($model->event_id=>array('selected'=>true))));?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<?php if($model->isNewRecord) {?>
    <div class="row">
         <table border="0" id="table-1" cellspacing="5">
			<tr class="eventlist">
				<td >
					<?php echo $form->labelEx($model,'score'); ?>
				</td>
                </tr>
                <tr>
				<td>
					<?php echo $form->textField($model,'score[]',array('class'=>'textbox','placeholder'=>'_ _:_ _ _ _')); ?>
                </td>
				<td class="special addbtn">
                	<a href="#" class="addone" style="text-decoration: none;">Add Score</a>
                </td>
			</tr>
		</table>
        <?php echo $form->error($model,'score'); ?>
        </div>
        <?php }else{?>
        <div class="row">
       		 <?php echo $form->labelEx($model,'score'); ?>
			 <?php echo $form->textField($model,'score',array('class'=>'textbox')); ?>
        	 <?php echo $form->error($model,'score'); ?>
		</div>
        <?php }?>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'dateTime'); ?>
		<?php echo $form->textField($model,'dateTime'); ?>
		<?php echo $form->error($model,'dateTime'); ?>
	</div>-->

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