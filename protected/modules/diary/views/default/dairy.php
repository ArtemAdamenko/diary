<?php
/* @var $this SiteController */
	

		$users = Users::model()->findByPk(Yii::app()->user->id, array('select' => array('name', 'secondName', 'thirdName')));
		echo "<b>".$users['secondName']." ".$users['name']." ".$users['thirdName']."</b>";


		$user = new Users();
		$this->widget('zii.widgets.grid.CGridView', array(
	    'dataProvider' => $user->getData(),

	    'columns' => array(
	    	array(
	            'name' => 'subj',
	            'header'=>'Предмет',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data["subject"])',
	            'htmlOptions' => array('font-size' => 20),
	        ),
	        array(
	            'name' => 'Январь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[1]["rate"])',
	        ),
	        array(
	            'name' => 'Февраль',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[2]["rate"])'
	        ),
	        array(
	            'name' => 'Март',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[3]["rate"])'
	        ),
	        array(
	            'name' => 'Апрель',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[4]["rate"])'
	        ),
	        array(
	            'name' => 'Май',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[5]["rate"])'
	        ),
	        array(
	            'name' => 'Июнь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[6]["rate"])'
	        ),
	        array(
	            'name' => 'Июль',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[7]["rate"])'
	        ),
	        array(
	            'name' => 'Август',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[8]["rate"])'
	        ),
	        array(
	            'name' => 'Сентябрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[9]["rate"])'
	        ),
	        array(
	            'name' => 'Октябрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[10]["rate"])'
	        ),
	        array(
	            'name' => 'Ноябрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[11]["rate"])'
	        ),
	        array(
	            'name' => 'Декабрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[12]["rate"])'
	        ),
	    ),
	));


	
?>

