<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.2
Version: 1.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>World Talent</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="MobileOptimized" content="320">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->          
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<!-- BEGIN THEME STYLES --> 
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/css/style-metronic.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/css/favicon.ico" />
    
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/scripts/app.js"></script>      
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		});
	</script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->   
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="header-inner">
			<!-- BEGIN LOGO -->  
			<a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">
			<!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/img/logo.png" alt="logo" class="img-responsive" />-->
            World Talent
			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER --> 
			<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/img/menu-toggler.png" alt="" />
			</a> 
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/2014/img/avatar1_small.jpg"/>
					<span class="username"><?php echo Yii::app()->user->name?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/profile/profile"><i class="fa fa-user"></i> My Profile</a></li>
						<li class="divider"></li>
						<li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Full Screen</a></li>
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/extra_lock.html"><i class="fa fa-lock"></i> Lock Screen</a></li>
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/logout"><i class="fa fa-key"></i>Log out</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix"></div>
	<!-- BEGIN CONTAINER -->   
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->  
           <?php $record=Yii::app()->db->createCommand("select itemname from AuthAssignment where userid = '".Yii::app()->user->id."'")->queryRow();
		   
			if($record['itemname']=='Admin'){?> 
            <ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				
				<li class="start <?php if(Yii::app()->controller->id == 'assignment' || Yii::app()->controller->id == 'authitem'){echo 'active';}?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/rights">
					<i class="fa fa-home"></i> 
					<span class="title">Rights</span>
                    <?php if(Yii::app()->controller->id == 'assignment' || Yii::app()->controller->id == 'authitem'){echo '<span class="selected"></span>';}?>
                   
					</a>
				</li>
				<li class="<?php if(Yii::app()->controller->id == 'profile'){echo 'active';}?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/profile/profile">
					<i class="fa fa-user"></i> 
					<span class="title">Profiles</span>
                    <?php if(Yii::app()->controller->id == 'profile'){echo '<span class="selected"></span>';}?>
					</a>
				</li>
                <li class="start <?php if(Yii::app()->controller->id == 'sport'){echo 'active';}?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/Sport/admin">
                    <i class="fa fa-cogs"></i> 
					<span class="title">Sports</span>
                     <?php if(Yii::app()->controller->id == 'sport'){echo '<span class="selected"></span>';}?>
					</a>
				</li>
				<li class="start <?php if(Yii::app()->controller->id == 'categories'){echo 'active';}?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/categories/admin">
					<i class="fa fa-gift"></i> 
					<span class="title">Categories</span>
                    <?php if(Yii::app()->controller->id == 'categories'){echo '<span class="selected"></span>';}?>
					</a>
				</li>
				<li class="start <?php if(Yii::app()->controller->id == 'events'){echo 'active';}?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/events/admin">
					<i class="fa fa-bookmark-o"></i> 
					<span class="title">Events</span>
                    <?php if(Yii::app()->controller->id == 'events'){echo '<span class="selected"></span>';}?>
					</a>
				</li>
				<li class="start <?php if(Yii::app()->controller->id == 'units'){echo 'active';}?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/units/admin">
					<i class="fa fa-table"></i> 
					<span class="title">Units</span>
                    <?php if(Yii::app()->controller->id == 'units'){echo '<span class="selected"></span>';}?>
					</a>
				</li>
				<li class="start <?php if(Yii::app()->controller->id == 'scores'){echo 'active';}?>">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/Scores/admin">
					<i class="fa fa-sitemap"></i> 
					<span class="title">Scores</span>
                    <?php if(Yii::app()->controller->id == 'scores'){echo '<span class="selected"></span>';}?>
					</a>
				</li>
				<li class="last ">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/logout">
					<i class="fa fa-key"></i> 
					<span class="title"><?php echo Logout.' ('.Yii::app()->user->name.')'?></span>
					</a>
				</li>
			</ul>
            <?php }elseif($record['itemname']=='Subscriber'){
				?>
            <ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
                 <li class="start ">
                        <a href="#">
                        <i class="fa fa-user"></i> 
                        <span class="title">Search</span>
                        <?php //if(Yii::app()->controller->id == 'profile'){echo '<span class="selected"></span>';}?>
                        </a>
                </li>
                <li class="<?php if(Yii::app()->controller->id == 'user'){echo 'active';}?>">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/user">
                        <i class="fa fa-user"></i> 
                        <span class="title">Football Talent</span>
                        <?php if(Yii::app()->controller->id == 'user'){echo '<span class="selected"></span>';}?>
                        </a>
                </li>
                <li class="<?php if(Yii::app()->controller->id == 'profile'){echo 'active';}?>">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/profile/profile">
                        <i class="fa fa-user"></i> 
                        <span class="title">Profiles</span>
                        <?php if(Yii::app()->controller->id == 'profile'){echo '<span class="selected"></span>';}?>
                        </a>
                </li>
                <li class="last ">
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/logout">
					<i class="fa fa-key"></i> 
					<span class="title"><?php echo Logout.' ('.Yii::app()->user->name.')'?></span>
					</a>
				</li>
            </ul>
			<?php }?>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER-->
			<!-- END BEGIN STYLE CUSTOMIZER -->           
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						<!--Blank Page <small>blank page</small>-->
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						
						<!--<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a> 
							<i class="fa fa-angle-right"></i>
						</li>-->
						<!--<li>
							<a href="<?php //echo Yii::app()->request->baseUrl.'/'.Yii::app()->controller->id.'/admin' ?>"><?php //echo Yii::app()->controller->id;?></a>
							<i class="fa fa-angle-right"></i>
						</li>-->
						<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?><?php //echo $this->action->id;?><!--<a href="#"></a><li></li>-->
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<?php  echo $content;?>
					<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
				</div>
			</div>
            <div class="span-5 last">
	<div id="sidebar">
	
	</div><!-- sidebar -->
</div>
			<!-- END PAGE CONTENT-->
		</div>
		<!-- END PAGE -->    
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
			
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
	<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->   
	

	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>