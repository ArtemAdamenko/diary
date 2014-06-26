<h1>Управление учениками</h1><?php
/* @var $this UsersController */
/* @var $model Users */



$this->menu=array(
	array('label'=>'Добавить ученика', 'url'=>array('create')),
	array('label'=>'Изучаемые предметы', 'url'=>array('/diary/subjects/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php 	
//котрываем сессию для хранения значения фильтра
$session = new CHttpSession;
$session->open();
//если отфильтровали
//то заносим в сессию
if (isset($_GET['Users'])){
	$session['user'] = $_GET['Users'];
}

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'login',
		'secondName',
		'name',	
		'thirdName',
		'group',
		'email',
		array(
			'name' => 'role',
			'value' => '$data->role == "user" ? "Ученик" : "Администрация"',

			),
		array(
			'class'=>'CButtonColumn',
		),
	),
	'rowHtmlOptionsExpression'=>'array("style" => "cursor:pointer")', 
	'selectionChanged'=>'function(){ 
						var id = ($(".selected td a:first").attr("href").split("id")[1]);
						location.href = "index.php?r=diary/users/rates/id/" + id;
					}',
	'ajaxUpdate' => false,
)); 

?>
