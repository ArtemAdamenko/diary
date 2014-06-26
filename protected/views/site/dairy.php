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
	            'header'=>'Предмет/Дата',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data["subject"])',
	            'htmlOptions' => array('font-size' => 20),
	        ),
	        array(
	            'name' => 'Январь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[1])',
	        ),
	        array(
	            'name' => 'Февраль',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[2])'
	        ),
	        array(
	            'name' => 'Март',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[3])'
	        ),
	        array(
	            'name' => 'Апрель',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[4])'
	        ),
	        array(
	            'name' => 'Май',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[5])'
	        ),
	        array(
	            'name' => 'Июнь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[6])'
	        ),
	        array(
	            'name' => 'Июль',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[7])'
	        ),
	        array(
	            'name' => 'Август',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[8])'
	        ),
	        array(
	            'name' => 'Сентябрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[9])'
	        ),
	        array(
	            'name' => 'Октябрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[10])'
	        ),
	        array(
	            'name' => 'Ноябрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[11])'
	        ),
	        array(
	            'name' => 'Декабрь',
	            'type' => 'raw',
	            'value' => 'CHtml::encode($data[12])'
	        ),
	    ),
	));


	
?>

