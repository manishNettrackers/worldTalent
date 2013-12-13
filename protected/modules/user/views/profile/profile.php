<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
);
?><h1><?php echo ucfirst(Yii::app()->user->name) .' profile';?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>

<div class="col-md-9">
<div class="tab-content">
    <div id="tab_1-1" class="tab-pane active">
			
            <div class="form-group">
               <label class="control-label">User Name</label>
                <input type="text" class="form-control" value="<?php echo $model->username?>"  disabled="disabled" />
            </div>
            <?php 
                $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
                if ($profileFields) {
                    foreach($profileFields as $field) {
                    ?>
            
            		<div class="form-group">
                       <label class="control-label"><?php echo CHtml::encode(UserModule::t($field->title)); ?></label>
                       <input type="text" class="form-control" value="<?php echo $profile->getAttribute($field->varname);?>" disabled="disabled" />
                        <?php //echo $profile->getAttribute($field->varname);
						 //(($field->widgetView($profile,array('class'=>"form-control")))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
                    </div>
                    <?php
                    }
                }
            ?>
            
            <div class="form-group">
                <label class="control-label">E-Mail</label>
                <input type="text" class="form-control" value="<?php echo $model->email?>"  disabled="disabled" />
            </div>
             <div class="form-group">
                <label class="control-label">Registration date </label>
                <input type="text" class="form-control" value=<?php echo $model->create_at; ?>  disabled="disabled" />
            </div>
            <div class="form-group">
                <label class="control-label">Last visit </label>
                <input type="text" class="form-control" value="<?php echo $model->lastvisit_at?>"  disabled="disabled"  />
            </div>
            <div class="form-group">
                <label class="control-label">Status </label>
                <input type="text" class="form-control" value="<?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));?>"  disabled="disabled"  />
            </div>
    </div>
</div>
</div>
