<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->


	<!-- blueprint CSS framework -->
<head>
    <meta charset="utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
 
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   
   <!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />              
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/revolution_slider/css/rs-style.css" media="screen">
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen"> 
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />                
   <!-- END PAGE LEVEL PLUGIN STYLES -->
 
   <!-- BEGIN THEME STYLES --> 
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
   <!-- END THEME STYLES -->
 
   <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
<div class="header navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
		</div>
		<!-- BEGIN TOP BAR -->
<div class="front-topbar">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ul class="list-unstyle inline">
					<li><i class="icon-phone topbar-info-icon top-2"></i>Call us: <span>(1) 456 6717</span></li>
					<li class="sep"><span>|</span></li>
					<li><i class="icon-envelope-alt topbar-info-icon top-2"></i>Email: <span>raheel@norvida.com</span></li>
				</ul>
			</div>
			<div class="col-md-6 topbar-social">
				<ul class="list-unstyled inline">
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-google-plus"></i></a></li>
					<li><a href="#"><i class="icon-linkedin"></i></a></li>
					<li><a href="#"><i class="icon-youtube"></i></a></li>
					<li><a href="#"><i class="icon-skype"></i></a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- END TOP BAR -->
<!-- BEGIN TOP NAVIGATION MENU -->
<div class="navbar-collapse collapse">

		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Rights', 'url'=>array('/rights'), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Discipline', 'url'=>array('/disciplineDetails'), 'visible'=>!Yii::app()->user->isGuest),
								array('label'=>'Scores', 'url'=>array('/userScore'), 'visible'=>!Yii::app()->user->isGuest),
				
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
				),
				)); ?>
                         
</div>
<!-- BEGIN TOP NAVIGATION MENU -->
	</div>
</div>

<!-- BEGIN CONTAINER -->   
    <div class="container">
    <?php echo $content; ?>
    </div>
    <!-- END CONTAINER -->


<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="container">
    <h2>About us</h2>
    <p>We are simply cool - as simple as that.</p>
	</div>
</div>
<!-- END FOOTER -->
 
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	<div class="container">
    	Copyright &copy; <?php echo date('Y'); ?> by My Company. 		All Rights Reserved.
	</div>
</div>
<!-- END COPYRIGHT -->



















<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/back-to-top.js"></script>    
 
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/fancybox/source/jquery.fancybox.pack.js"></script>    
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/hover-dropdown.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->   
    <!-- END CORE PLUGINS -->   
 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/plugins/bxslider/jquery.bxslider.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/scripts/app.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/frontend/scripts/index.js"></script>    
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();    
            App.initBxSlider();
            Index.initRevolutionSlider();                    
        });
    </script>
	
    <!-- END JAVASCRIPTS -->
</body>
</html>
