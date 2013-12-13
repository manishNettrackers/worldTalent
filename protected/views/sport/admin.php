<?php
/* @var $this SportController */
/* @var $model Sport */

$this->breadcrumbs=array(
	'Sports'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sport', 'url'=>array('index')),
	array('label'=>'Create Sport', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sport-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="row">
				<div class="col-md-8">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box light-grey">
						<div class="portlet-title">
							<div class="caption"><i class="fa fa-globe"></i>Manage Sports</div>
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
	'id'=>'sport-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'cssFile'=>'',
	'htmlOptions' => array('class' => 'table-scrollable'),
	'itemsCssClass' => 'table table-striped table-bordered table-hover dataTable',
	'rowCssClass'=>array('odd gradeX', 'odd gradeX even'),
	'pagerCssClass'=>'dataTables_paginate paging_bootstrap',
	'columns'=>array(
		//'id',
		'SportName',
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