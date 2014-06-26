<?php
/* @var $this DefaultController */

/*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Предметы', 'url'=>array('/admin/subjects/admin')),
				array('label'=>'Пользователи', 'url'=>array('/admin/users/admin')),
				array('label'=>'Выход', 'url'=>array('/site/logout')),
			),
		)); 
*/?>

<ul style="font-size:20px;">
<li><?php echo CHtml::link("Изучаемые предметы", array("/diary/subjects/admin")); ?></li>
<li><?php echo CHtml::link("Список учеников", array("/diary/users/admin")); ?></li>
<li><?php echo CHtml::link("Выход", array("/site/logout")); ?></li>
</ul>
