<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/mainpage';
}
else
$this->layout='//layouts/mainpage';
?>
 <div class="row">
<?php
	foreach($profiles as $profilesval)
	{ ?>


        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            
            <div class="tile double bg-green">
            <div class="tile-body">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/admin/view/id/<?php echo $profilesval['user_id'];?>">
           <?php  if($Profile_image[$profilesval['user_id']]->image!=''){ ?>
						<img src="<?php echo Yii::app()->request->baseUrl.'/banner/'.$Profile_image[$profilesval['user_id']]->image;?>" alt="" width="47px" height="36px">
					<?php }else {?>
						<img src="http://www.placehold.it/310x170/EFEFEF/AAAAAA&amp;text=no+image" alt="" width="47px" height="36px">
					<?php }?>
            
            <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/messi2.jpg" width="30%" class="pull-right">-->
            <h3><?php echo $profilesval['firstname'];?></h3>
            <p>Here is something about this user</p>
            <div class="tile-object">
						<div class="name">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="number">
							14
						</div>
                        </div></a>
					
            </div>
            </div>
        </div>
        <?php }?>
</div>
