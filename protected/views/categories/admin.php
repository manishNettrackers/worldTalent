<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categories-grid').yiiGridView('update', {
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
							<div class="caption"><i class="fa fa-globe"></i>Manage Category</div>
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
	'id'=>'categories-grid',
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
            'header'=>'SportName',
            'type'=>'html',
            'value'=>'$data->sports->SportName',
        ),
		//'sports_id',
		'category',
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