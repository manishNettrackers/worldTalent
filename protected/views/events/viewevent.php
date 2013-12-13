<style type="text/css">
.event{ width:100%;}
.score{ width:100%;}
</style>
<div class="row">
  <div class="col-md-6 col-sm-12 event"> 
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box grey">
      <div class="portlet-title">
        <div class="caption"><i class="fa fa-user"></i>Event - <?php echo $event_details['eventName'];?></div>
        <!--<div class="actions"> <a href="#" class="btn blue"><i class="fa fa-pencil"></i> Add</a>
          <div class="btn-group"> <a class="btn green" href="#" data-toggle="dropdown"> <i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i> </a>
            <ul class="dropdown-menu pull-right">
              <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
              <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              <li><a href="#"><i class="fa fa-ban"></i> Ban</a></li>
              <li class="divider"></li>
              <li><a href="#"><i class="i"></i> Make admin</a></li>
            </ul>
          </div>
        </div>-->
      </div>
      <div class="portlet-body">
        <div id="sample_2_wrapper" class="dataTables_wrapper form-inline" role="grid">
          <!--<div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="dataTables_length" id="sample_2_length">
                <label>
                <div id="s2id_autogen1" class="select2-container form-control input-xsmall">
                  <div class="select2-drop select2-display-none select2-with-searchbox"></div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div id="sample_2_filter" class="dataTables_filter"></div>
            </div>
          </div>-->
          <div class="table-scrollable">
            <table aria-describedby="sample_2_info" class="table table-striped table-bordered table-hover dataTable" id="sample_2">
              <thead>
                <tr role="row">
                  <th aria-label="" colspan="1" rowspan="1" role="columnheader" class="sorting_disabled" style="width: 63px;"><div class="checker"><span>
                      <input class="group-checkable" data-set="#sample_2 .checkboxes" type="checkbox">
                      </span></div></th>
                  <th aria-label="Email: activate to sort column ascending" style="width: 290px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" role="columnheader" class="sorting">Sports Name</th>
                 <th aria-label="Status: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" role="columnheader" class="sorting">Category Name</th>
                  <th aria-label="Status: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" role="columnheader" class="sorting">Event Name</th>
                  <th aria-label="Status: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" role="columnheader" class="sorting">Unit Name</th>
                  <th aria-label="Status: activate to sort column ascending" style="width: 153px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" role="columnheader" class="sorting">Description</th>
                </tr>
              </thead>
              <tbody aria-relevant="all" aria-live="polite" role="alert">
                <tr class="gradeX odd">
                  <td class="  sorting_1"><div class="checker"><span>
                      <input class="checkboxes" value="1" type="checkbox">
                      </span></div></td>
                  <td class=" "><?php echo $event_details['SportName'];?></td>
                  <td class=" "><?php echo $event_details['category'];?></td>
                  <td class=" "><?php echo $event_details['eventName'];?></td>
                  <td class=" "><?php echo $event_details['unitName'];?></td>
                  <td class=" "><?php echo $event_details['description'];?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET--> 
  </div>
</div>

<div class="row">
<div class="col-md-6 col-sm-12 score"> 
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box purple">
      <div class="portlet-title">
        <div class="caption"><i class="fa fa-cogs"></i>User Score -</div>
      </div>
      <div class="portlet-body">
        <div id="sample_3_wrapper" class="dataTables_wrapper form-inline" role="grid">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="dataTables_length" id="sample_3_length"></div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div id="sample_3_filter" class="dataTables_filter"></div>
            </div>
          </div>
          <div class="table-scrollable">
            <table aria-describedby="sample_3_info" class="table table-striped table-bordered table-hover dataTable" id="sample_3">
              <thead>
                <tr role="row">
                  <th aria-label="" style="width: 21px;" colspan="1" rowspan="1" role="columnheader" class="table-checkbox sorting_disabled"><div class="checker"><span>
                      <input class="group-checkable" data-set="#sample_3 .checkboxes" type="checkbox">
                      </span></div></th>
                  <th aria-label="Username: activate to sort column ascending" style="width: 189px;" colspan="1" rowspan="1" aria-controls="sample_3" tabindex="0" role="columnheader" class="sorting">User Name</th>
                  <th aria-label="Email: activate to sort column ascending" style="width: 309px;" colspan="1" rowspan="1" aria-controls="sample_3" tabindex="0" role="columnheader" class="sorting">Category</th>
                  <th aria-label="Email: activate to sort column ascending" style="width: 309px;" colspan="1" rowspan="1" aria-controls="sample_3" tabindex="0" role="columnheader" class="sorting">Event Name</th>
                   <!--<th aria-label="Email: activate to sort column ascending" style="width: 309px;" colspan="1" rowspan="1" aria-controls="sample_3" tabindex="0" role="columnheader" class="sorting">Unit Id</th>-->
                    <th aria-label="Email: activate to sort column ascending" style="width: 309px;" colspan="1" rowspan="1" aria-controls="sample_3" tabindex="0" role="columnheader" class="sorting">Average Score</th>
                     <th aria-label="Email: activate to sort column ascending" style="width: 309px;" colspan="1" rowspan="1" aria-controls="sample_3" tabindex="0" role="columnheader" class="sorting">Date Time</th>
                     <!-- <th aria-label="Email: activate to sort column ascending" style="width: 309px;" colspan="1" rowspan="1" aria-controls="sample_3" tabindex="0" role="columnheader" class="sorting">Description</th>-->
                </tr>
              </thead>
               <?php 
foreach($event_users as $event_usersval)
{?>
              <tbody aria-relevant="all" aria-live="polite" role="alert">
                <tr class="gradeX odd">
                  <td class="  sorting_1"><div class="checker"><span>
                      <input class="checkboxes" value="1" type="checkbox">
                      </span></div></td>
                  <td class=" "><?php echo $event_usersval['username'];?></td>
                  <td class=" "><?php if($event_usersval['category']=='')
				  						echo 'not set';
				 					 else
				 						echo $event_usersval['category'];?></td>
                  <td class=" "><?php echo $event_usersval['event'];?></td>
                  <td class=" "><?php echo $event_usersval['Avarage Sore'];?></td>
                  <td class=" "><?php echo $event_usersval['dateTime'];?></td>
                </tr>
              </tbody>
              <?php }?>
            </table>
          </div>
          <!--<div class="row">
            <div class="col-md-5 col-sm-12">
              <div id="sample_3_info" class="dataTables_info">Showing 1 to 5 of 12 entries</div>
            </div>
            <div class="col-md-7 col-sm-12">
              <div class="dataTables_paginate paging_bootstrap">
                <ul style="visibility: visible;" class="pagination">
                  <li class="prev disabled"><a href="#" title="Prev"><i class="fa fa-angle-left"></i></a></li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li class="next"><a href="#" title="Next"><i class="fa fa-angle-right"></i></a></li>
                </ul>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET--> 
  </div>
</div>

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'scores-grid',
	'dataProvider'=>$model->scoresearch(),
	'filter'=>$model,
	'columns'=>array(
		/*array(
            'name'=>'user_id',
            'type'=>'html',
            'value'=>'$data->s.user->username',
        ),
		array(
			//'header'=>'Sport Name',
            'name'=>'category_id',
            'type'=>'html',
            'value'=>'$data->s.category->category',
        ),
		
		array(
			//'header'=>'Sport Name',
            'name'=>'event_id',
            'type'=>'html',
            'value'=>'$data->s.event->eventName',
        ),

		'user_id',
		'category_id',
		'event_id',
		'score',
		'unit_id',
		/*array(
			//'header'=>'Sport Name',
            'name'=>'s.unit_id',
            'type'=>'html',
            'value'=>'$data->s.unit->unitName',
        ),
		'dateTime',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>