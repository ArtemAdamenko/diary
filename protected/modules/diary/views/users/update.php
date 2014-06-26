<h1>Редактирование ученика</h1><?php
/* @var $this UsersController */
/* @var $model Users */


$this->menu=array(
	array('label'=>'Список учеников', 'url'=>array('admin')),
	array('label'=>'Изучаемые предметы', 'url'=>array('/diary/subjects/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model, 'check' => $check)); ?>