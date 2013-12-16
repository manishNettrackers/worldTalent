<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$profile)); ?>
	
	<div class="form-group">
	<?php echo $form->labelEx($model,'username',array('class'=>"control-label visible-ie8 visible-ie9")); ?>
    <div class="input-icon">
					<i class="fa fa-user"></i>
	<?php echo $form->textField($model,'username',array('class'=>"form-control placeholder-no-fix",'placeholder'=>"Username")); ?>
	<?php echo $form->error($model,'username'); ?>
    </div>
	</div>
	
	<div class="form-group">
	<?php echo $form->labelEx($model,'password',array('class'=>"control-label visible-ie8 visible-ie9")); ?>
    <div class="input-icon">
					<i class="fa fa-lock"></i>
	<?php echo $form->passwordField($model,'password',array('class'=>"form-control placeholder-no-fix",'placeholder'=>"Password")); ?>
	<?php echo $form->error($model,'password'); ?>
    </div>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="form-group">
	<?php echo $form->labelEx($model,'verifyPassword',array('class'=>"control-label visible-ie8 visible-ie9")); ?>
   <div class="controls">
					<div class="input-icon">
						<i class="fa fa-check"></i>
	<?php echo $form->passwordField($model,'verifyPassword',array('class'=>"form-control placeholder-no-fix",'placeholder'=>"Re-type Your Password")); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
    </div>
	</div>
    </div>
    <div class="form-group">
    <div class="margin-top-10 fileupload fileupload-new" data-provides="fileupload">
															<div class="input-group input-group-fixed">
																<span class="input-group-btn">
																<span class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i> 
																<span class="fileupload-preview"></span>
																</span>
																</span>
																<span class="btn default btn-file">
																<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
																<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                               <?php 
															   $gallerymodel=new Gallery;
															   echo $form->labelEx($gallerymodel,'image',array('class'=>"control-label visible-ie8 visible-ie9")); 
															   echo $form->fileField($gallerymodel,'image',array('class'=>'default'));
															   echo $form->error($gallerymodel,'image');
															   ?>
																</span>
																<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a>
															</div>
                                                            </div>
    
	<div class="form-group">
	<?php echo $form->labelEx($model,'email',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
    <div class="input-icon">
					<i class="fa fa-envelope"></i>
	<?php echo $form->textField($model,'email',array('placeholder'=>"Email" ,'class'=>'form-control placeholder-no-fix')); ?>
	<?php echo $form->error($model,'email'); ?>
    </div>
	</div>
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile,array('class'=>'form-control'))) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'class'=>'form-control','maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'verifyCode',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		
		<?php $this->widget('CCaptcha'); ?>
        <div class="input-icon">
					<i class="fa fa-check"></i>
		<?php echo $form->textField($model,'verifyCode',array('placeholder'=>"Enter text" ,'class'=>'form-control placeholder-no-fix')); ?>
		<?php echo $form->error($model,'verifyCode'); ?>
		</div>
		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	</div>
	<?php endif; ?>
	
	<div class="form-actions">
   		<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/login">
       		 <button id="register-back-btn" type="button" class="btn"><i class="m-icon-swapleft"></i>Back</button>
        </a>
		<?php echo CHtml::submitButton(UserModule::t("Register"),array( 'class'=>"btn green pull-right")); ?>
        <i class="m-icon-swapright m-icon-white"></i>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>