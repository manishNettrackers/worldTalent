<?php
/* @var $this EventsController */
/* @var $data Events */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sports_id')); ?>:</b>
	<?php echo CHtml::encode($data->sports->SportName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eventName')); ?>:</b>
	<?php echo CHtml::encode($data->eventName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unitid')); ?>:</b>
	<?php echo CHtml::encode($data->unit->unitName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>