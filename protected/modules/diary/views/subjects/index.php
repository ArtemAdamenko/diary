<?php
/* @var $this SubjectsController */
/* @var $dataProvider CActiveDataProvider */


$this->menu=array(
	array('label'=>'Список предметов', 'url'=>array('admin')),
	array('label'=>'Список учеников', 'url'=>array('/diary/users/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);
?>

<h1>Изучаемые предметы</h1>

<?php 
	$subjects = new Subjects();
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$subjects->search(),
	'itemView'=>'_view',
)); ?>
