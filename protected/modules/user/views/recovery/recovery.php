<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>
<?php echo CHtml::errorSummary($form); ?>
			<h3 >Forget Password ?</h3>
			<p>Enter your e-mail address below to reset your password.</p>
			<div class="form-group">
				<div class="input-icon">
					<i class="fa fa-envelope"></i>
					<?php echo CHtml::activeTextField($form,'login_or_email',array('class'=>'form-control placeholder-no-fix','placeholder'=>'Email')) ?>
				</div>
			</div>
			<div class="form-actions">
            	<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/login"> 
                    <button type="button" id="back-btn" class="btn">
                    <i class="m-icon-swapleft"></i>Back
                    </button>
                </a>
                <?php echo CHtml::submitButton("Restore",array('class'=>'btn green pull-right')); ?>
				 <i class="m-icon-swapright m-icon-white"></i>
			</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>