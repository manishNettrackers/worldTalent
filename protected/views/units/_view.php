<?php
/* @var $this UnitsController */
/* @var $data Units */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unitName')); ?>:</b>
	<?php echo CHtml::encode($data->unitName); ?>
	<br />


</div>