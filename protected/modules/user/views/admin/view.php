<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);

?>

<div class="row thumbnails">
  <div class="meet-our-team">
    <h3><?php echo $profilesDeatils['firstname'];?> <small>Chief Executive Officer / CEO</small></h3>
    <div class="team-info">
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem...</p>
      <div class="col-md-6">
<div class="tab-content">
    <div id="tab_1-1" class="tab-pane active">
            <div class="form-group">
               <label class="control-label">User Name</label>
                <input type="text" class="form-control" value="<?php echo $userDeatils['username']?>"  disabled="disabled" />
            </div>
            <?php 
                $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
				
                if ($profilesDeatils) {
                    foreach($profilesDeatils as $profileskey=>$profilesval) {
                    ?>
            
            		<div class="form-group">
                       <label class="control-label"><?php echo ucfirst($profileskey); ?></label>
                       <input type="text" class="form-control" value="<?php echo $profilesval;?>" disabled="disabled" />
                    </div>
                    <?php
                    }
                }
            ?>
            
            <div class="form-group">
                <label class="control-label">E-Mail</label>
                <input type="text" class="form-control" value="<?php echo $userDeatils['email']?>"  disabled="disabled" />
            </div>
             <div class="form-group">
                <label class="control-label">Registration date </label>
                <input type="text" class="form-control" value=<?php echo $userDeatils['create_at']; ?>  disabled="disabled" />
            </div>
            <div class="form-group">
                <label class="control-label">Last visit </label>
                <input type="text" class="form-control" value="<?php echo $userDeatils['lastvisit_at']?>"  disabled="disabled"  />
            </div>
            <div class="form-group">
                <label class="control-label">Status </label>
                <input type="text" class="form-control" value="<?php echo CHtml::encode(User::itemAlias("UserStatus",$userDeatils['status']));?>"  disabled="disabled"  />
            </div>
    </div>
</div>
</div>

<div class="col-md-4">
<label class="control-label">Profile Image:</label>
    <div class="thumbnail" style="width: 300px;">
		<?php
		
        if($Profile_image->image!=''){ ?>
        	<img src="<?php echo Yii::app()->request->baseUrl.'/banner/'.$Profile_image->image;?>" alt="">
        <?php }else {?>
        	<img src="http://www.placehold.it/310x170/EFEFEF/AAAAAA&amp;text=no+image" alt="">
        <?php }?>
    
    </div>
</div>
      <ul class="social-icons pull-right">
        <li><a href="#" data-original-title="twitter" class="twitter"></a></li>
        <li><a href="#" data-original-title="facebook" class="facebook"></a></li>
        <li><a href="#" data-original-title="linkedin" class="linkedin"></a></li>
        <li><a href="#" data-original-title="Goole Plus" class="googleplus"></a></li>
        <li><a href="#" data-original-title="skype" class="skype"></a></li>
      </ul>
    </div>
  </div>
</div>

<?php
	$i=0;
	foreach($totalevent as $catKey=>$catVal)
	{ 
		//echo count($totalevent);
		if($i==0)
			$eventclass='green';
		else if($i==1)
			$eventclass='blue';
		else if($i==2)
			$eventclass='yellow';
		else if($i==3)
			$eventclass='purple';
		else if($i==4)
			$eventclass='green';
		else if($i==5)
			$eventclass='blue';
		else if($i==6)
			$eventclass='yellow';	?>
        <div class="row update_event">
        <div>
        <h1 class="event_list_block">
        <?php echo $catKey;?>
        </h1>
            <?php foreach($catVal as $totaleventval )
            {?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="dashboard-stat <?php echo $eventclass;?>">
                      <div class="visual"> <span class="football"></span> </div>
                      <div class="details">
                        <div class="number">
                             <?php echo number_format($totaleventval['score'],3);?>
                         </div>
                     <div class="desc"><small><?php echo $totaleventval['unitname']?></small></div>
                    </div>
                    <a class="more" href="<?php echo Yii::app()->request->baseUrl; ?>/events/viewevent/<?php echo $totaleventval['event_id']?>"><?php echo 
                    $totaleventval['event']?> <i class="m-icon-swapright m-icon-white"></i> </a>
                  </div>
     		   </div>
         <?php }?>
        </div>
		 </div>
  <?php $i++;}?>
 <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat green">
      <div class="visual"> <i class="fa fa-shopping-cart"></i> </div>
      <div class="details">
        <div class="number">13.981</div>
        <div class="desc"><small>seconds</small></div>
      </div>
      <a class="more" href="#">100m run with football<i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat purple">
      <div class="visual"> <i class="fa fa-globe"></i> </div>
      <div class="details">
        <div class="number">12th</div>
        <div class="desc">Overall position</div>
      </div>
      <a class="more" href="#"><small>Complete list</small><i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>-->
  <div class="row">
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat yellow">
      <div class="visual"> <i class="fa fa-bar-chart-o"></i> </div>
      <div class="details">
        <div class="number"><?php echo Yii::app()->user->name;?></div>
        <?php //$scoresDetails=Yii::app()->db->createCommand("select * from scores where username='".Yii::app()->user->name."'")->queryRow();?>
        <div class="desc"><small>Copenhagen, DK</small></div>
      </div>
      <a class="more" href="#">See full report<i class="m-icon-swapright m-icon-white"></i> </a> </div>
  </div>
  </div>
