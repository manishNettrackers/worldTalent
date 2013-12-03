<?php
/* @var $this SportController */
/* @var $data Sport */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SportName')); ?>:</b>
	<?php echo CHtml::encode($data->SportName); ?>
	<br />


</div>