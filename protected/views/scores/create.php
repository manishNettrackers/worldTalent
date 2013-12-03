<?php
/* @var $this ScoresController */
/* @var $model Scores */

$this->breadcrumbs=array(
	'Scores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Scores', 'url'=>array('index')),
	array('label'=>'Manage Scores', 'url'=>array('admin')),
);
?>

<h1>Create Scores</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>