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

<h1>Manage Scores</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'scores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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
            'name'=>'event_id',
            'type'=>'html',
            'value'=>'$data->event->eventName',
        ),
		'score',
		'dateTime',
		'description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>