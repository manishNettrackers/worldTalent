<?php
/* @var $this UnitsController */
/* @var $model Units */

$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Units', 'url'=>array('index')),
	array('label'=>'Manage Units', 'url'=>array('admin')),
);
?>

<h1>Create Units</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>