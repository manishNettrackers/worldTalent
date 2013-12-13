<?php
/* @var $this ScoresController */
/* @var $model Scores */

$this->breadcrumbs=array(
	'Scores'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Scores', 'url'=>array('index')),
	array('label'=>'Create Scores', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#scores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1></h1>

<p>

</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-globe"></i>Manage Scores</div>
							<div class="tools">
								<a href="javascript:;" class="collapse"></a>
								<a href="#portlet-config" data-toggle="modal" class="config"></a>
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
<div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'scores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>'',
	'htmlOptions' => array('class' => 'table-scrollable'),
	'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable',
	'rowCssClass'=>array('odd gradeX', 'odd gradeX even'),
	'pagerCssClass'=>'dataTables_paginate paging_bootstrap',
	'columns'=>array(
		//'id',
		array(
            'name'=>'user_id',
            'type'=>'html',
            'value'=>'$data->user->username',
        ),
		//'user_id',
		array(
			//'header'=>'Sport Name',
            'name'=>'category_id',
            'type'=>'html',
            'value'=>'$data->category->category',
        ),
		
		array(
			//'header'=>'Sport Name',
            'name'=>'event_id',
            'type'=>'html',
            'value'=>'$data->event->eventName',
        ),
		
		
		//'category_id',
		//'unit_id',
		
		'score',
		array(
			//'header'=>'Sport Name',
            'name'=>'unit_id',
            'type'=>'html',
            'value'=>'$data->unit->unitName',
        ),
		'dateTime',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</div>
</div>
</div>
</div>