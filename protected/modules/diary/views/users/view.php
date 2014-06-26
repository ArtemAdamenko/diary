<?php
/* @var $this UsersController */
/* @var $model Users */


$this->menu=array(

	array('label'=>'Список учеников', 'url'=>array('admin')),
	array('label'=>'Выставление оценок', 'url'=>array('rates', 'id'=>$model->id)),
	array('label'=>'Изучаемые предметы', 'url'=>array('/diary/subjects/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>


<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'login',
		'name',
		'secondName',
		'thirdName',
		'role',
		'group',
		'email',
	),
)); ?>
