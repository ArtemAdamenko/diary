<h1>Изучаемые предметы</h1><?php
/* @var $this SubjectsController */
/* @var $model Subjects */


$this->menu=array(
	array('label'=>'Добавить предмет', 'url'=>array('create')),
	array('label'=>'Список учеников', 'url'=>array('/diary/users/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subjects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form" style="display:none">
<?php 
	$this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subjects-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
