<?php
/* @var $this UsersController */

$this->menu=array(
	//array('label'=>'Добавить пользователя', 'url'=>array('create'), 'visible' => Yii::app()->user->checkAccess('manager')),
	array('label'=>'Управление', 'url'=>array('admin')),
	array('label'=>'Предметы', 'url'=>array('/diary/subjects/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>

<h1>Пользователи</h1>

<?php 
	$users = new Users();
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$users->search(),
	'itemView'=>'_view',
)); ?>
