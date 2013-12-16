<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
);

?>
<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li><a href="#tab_1_3" data-toggle="tab">Account</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active"><a data-toggle="tab" href="#tab_1-1"><i class="fa fa-cog"></i>Personal info</a> 
												<span class="after"></span></li>
											<li ><a data-toggle="tab" href="#tab_2-2"><i class="fa fa-picture-o"></i> Change Avatar</a></li>
											<li ><a data-toggle="tab" href="#tab_3-3"><i class="fa fa-lock"></i> Change Password</a></li>
											<!--<li ><a data-toggle="tab" href="#tab_4-4"><i class="fa fa-eye"></i> Privacity Settings</a></li>-->
										</ul>
									</div>
										<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
                                        <div class="success">
                                        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
                                        </div>
                                        <?php endif; ?>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
												<?php $form=$this->beginWidget('CActiveForm', array(
													'id'=>'profile-form',
													'enableAjaxValidation'=>true,
													'htmlOptions' => array('enctype'=>'multipart/form-data'),
												)); ?>
												<div class="form-body">
													<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
												
													<?php echo $form->errorSummary(array($model,$profile)); ?>
												
												<?php 
														$profileFields=$profile->getFields();
														if ($profileFields) {
															foreach($profileFields as $field) {
															?>
													<div class="form-group">
														<?php echo $form->labelEx($profile,$field->varname);
														
														if ($widgetEdit = $field->widgetEdit($profile,array('class'=>'form-control'))) {
															echo $widgetEdit;
														} elseif ($field->range) {
															echo $form->dropDownList($profile,$field->varname,Profile::range($field->range),array('class'=>"form-control"));
														} elseif ($field->field_type=="TEXT") {
															echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>"form-control"));
														} else {
															echo $form->textField($profile,$field->varname,array('placeholder'=>"Enter text",'class'=>'form-control','maxlength'=>(($field->field_size)?$field->field_size:255)));
														}
														echo $form->error($profile,$field->varname); ?>
													</div>	
															<?php
															}
														}
												?>
													<div class="form-group">
														<?php echo $form->labelEx($model,'username'); ?>
														<div class="input-group">
														<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'placeholder'=>"Enter text",'class'=>'form-control')); ?>
														<span class="input-group-addon"><i class="fa fa-user"></i></span>
														<?php echo $form->error($model,'username'); ?>
														</div>
													</div>
												
													<div class="form-group">
														<?php echo $form->labelEx($model,'email'); ?>
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
															<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'placeholder'=>"Enter text",'class'=>'form-control',)); ?>
															<?php echo $form->error($model,'email'); ?>
														</div>
													</div>
												</div>
													<div class="form-actions">
														<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),array('class'=>"btn blue")); ?>
													</div>
												
												<?php $this->endWidget(); ?>
											</div>
											<div id="tab_2-2" class="tab-pane">
                                            <?php $form=$this->beginWidget('CActiveForm', array(
                                                'id'=>'avater-form',
                                                'enableAjaxValidation'=>true,
												'htmlOptions' => array('enctype'=>'multipart/form-data'),
                                            )); ?>
												<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
													<div class="form-group">
														<div class="thumbnail" style="width: 310px;">
                                                        <?php
                                                        if($Profile_image->image!=''){ ?>
															<img src="<?php echo Yii::app()->request->baseUrl.'/banner/'.$Profile_image->image;?>" alt="">
														 <?php }else {?>
														<img src="http://www.placehold.it/310x170/EFEFEF/AAAAAA&amp;text=no+image" alt="">
														<?php }?>
															
														</div>
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
														<span class="label label-danger">NOTE!</span>
														<span>
														Attached image thumbnail is
														supported in Latest Firefox, Chrome, Opera, 
														Safari and Internet Explorer 10 only
														</span>
													</div>
													<div class="margin-top-10">
                                                    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),array('class'=>"btn green")); ?>
													</div>
												 <?php $this->endWidget(); ?>
											</div>
											<div id="tab_3-3" class="tab-pane">
                                            <?php $form=$this->beginWidget('CActiveForm', array(
                                                'id'=>'changepassword-form',
                                                'enableAjaxValidation'=>true,
                                                'clientOptions'=>array(
                                                    'validateOnSubmit'=>true,
                                                ),
                                            )); ?>
                                            
                                                <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
                                                <?php echo $form->errorSummary($passwordmodel); ?>
                                                
                                                <div class="form-group">
                                                <?php echo $form->labelEx($passwordmodel,'oldPassword',array('class'=>'control-label')); ?>
                                                <?php echo $form->passwordField($passwordmodel,'oldPassword',array('class'=>'form-control')); ?>
                                                <?php echo $form->error($passwordmodel,'oldPassword'); ?>
                                                </div>
                                                
                                                <div class="form-group">
                                                <?php echo $form->labelEx($passwordmodel,'password',array('class'=>'control-label')); ?>
                                                <?php echo $form->passwordField($passwordmodel,'password',array('class'=>'form-control')); ?>
                                                <?php echo $form->error($passwordmodel,'password'); ?>
                                                <p class="hint">
                                                <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                                                </p>
                                                </div>
                                                
                                                <div class="form-group">
                                                <?php echo $form->labelEx($passwordmodel,'verifyPassword',array('class'=>'control-label')); ?>
                                                <?php echo $form->passwordField($passwordmodel,'verifyPassword',array('class'=>'form-control')); ?>
                                                <?php echo $form->error($passwordmodel,'verifyPassword'); ?>
                                                </div>
                                                
                                                <div class="margin-top-10">
                                                <?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>"btn green")); ?>
                                                </div>
                                            <?php $this->endWidget(); ?>
											</div>
                                            
											<!--<div id="tab_4-4" class="tab-pane">
												<form action="#" class="">
													<table class="table table-bordered table-striped">
														<tr>
															<td>
																Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus..
															</td>
															<td>
																<label class="uniform-inline">
																<input type="radio" name="optionsRadios1" value="option1" />
																Yes
																</label>
																<label class="uniform-inline">
																<input type="radio" name="optionsRadios1" value="option2" checked />
																No
																</label>
															</td>
														</tr>
														<tr>
															<td>
																Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value="" /> Yes
																</label>
															</td>
														</tr>
														<tr>
															<td>
																Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value="" /> Yes
																</label>
															</td>
														</tr>
														<tr>
															<td>
																Enim eiusmod high life accusamus terry richardson ad squid wolf moon
															</td>
															<td>
																<label class="uniform-inline">
																<input type="checkbox" value="" /> Yes
																</label>
															</td>
														</tr>
													</table>
													<!--end profile-settings
													<div class="margin-top-10">
														<a href="#" class="btn green">Save Changes</a>
														<a href="#" class="btn default">Cancel</a>
													</div>
												</form>
											</div>-->
										</div>
									</div>
									<!--end col-md-9-->                                   
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->