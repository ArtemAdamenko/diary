<?php
/* @var $this SubjectsController */
/* @var $model Subjects */


$this->menu=array(
	array('label'=>'Список предметов', 'url'=>array('admin')),
	array('label'=>'Список учеников', 'url'=>array('/diary/users/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
	),
)); ?>
