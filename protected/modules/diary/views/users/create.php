<?php
/* @var $this UsersController */
/* @var $model Users */


$this->menu=array(
	//array('label'=>'Список пользователей', 'url'=>array('index')),
	array('label'=>'Список учеников', 'url'=>array('admin')),
	array('label'=>'Изучаемые предметы', 'url'=>array('/diary/subjects/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>

<h1>Добавить пользователя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>