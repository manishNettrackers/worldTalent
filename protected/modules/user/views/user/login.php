
		<!-- BEGIN LOGIN FORM -->
        <?php echo CHtml::beginForm(); ?>
			<h3 class="form-title">Login to your account</h3>
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
				<span>Enter any username and password.</span>
			</div>
			
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                
                <?php echo CHtml::errorSummary($model); ?>
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'username',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<div class="input-icon">
			<i class="fa fa-user"></i>
			<?php echo CHtml::activeTextField($model,'username',array('class'=>'form-control placeholder-no-fix','placeholder'=>'Username')) ?>
		</div>
	</div>
    <div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'password',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
		<div class="input-icon">
            <i class="fa fa-lock"></i>
            <?php echo CHtml::activePasswordField($model,'password',array('class'=>'form-control placeholder-no-fix','placeholder'=>'Password')) ?>				
		</div>
	</div>
    <div class="form-actions">
        <?php echo CHtml::activeCheckBox($model,'rememberMe',array('class'=>'checkbox','value'=>"1")); ?>
        <?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
		
		<?php echo CHtml::submitButton("Login",array('class'=>"btn green pull-right")); ?>
 		<i class="m-icon-swapright m-icon-white"></i>
    </div>
 
    <div class="forget-password">
        <h4>Forgot your password ?</h4>
        <p>
            no worries, <?php echo CHtml::link(UserModule::t("click here"),Yii::app()->getModule('user')->recoveryUrl); ?>
            to reset your password.
        </p>
    </div>
    <div class="create-account">
        <p>
            Don't have an account yet ?&nbsp; 
            <?php echo CHtml::link(UserModule::t("Create an account"),Yii::app()->getModule('user')->registrationUrl); ?>
        </p>
    </div>
        <?php echo CHtml::endForm(); ?>
		<!-- END LOGIN FORM -->        
		
	