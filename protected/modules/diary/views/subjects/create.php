<?php
/* @var $this SubjectsController */
/* @var $model Subjects */


$this->menu=array(
	array('label'=>'Список предметов', 'url'=>array('admin')),
	array('label'=>'Список учеников', 'url'=>array('/diary/users/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>

<h1>Добавить предмет</h1>
<br>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>