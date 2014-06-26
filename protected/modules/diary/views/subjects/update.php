<h1>Редактирование предмета</h1><?php
/* @var $this SubjectsController */
/* @var $model Subjects */

$this->menu=array(
	//array('label'=>'Список изучаемых предметов', 'url'=>array('index')),
	//array('label'=>'Добавить предмет', 'url'=>array('create')),
	array('label'=>'Список предметов', 'url'=>array('admin')),
	array('label'=>'Список учеников', 'url'=>array('/diary/users/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>