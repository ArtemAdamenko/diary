<?php
/* @var $this UsersController */
/* @var $model Users */
$this->menu=array(
	array('label'=>'Список учеников', 'url'=>array('admin')),
	array('label'=>'Предметы', 'url'=>array('/diary/subjects/admin')),
	array('label'=>'Выход', 'url'=>array('/site/logout')),
);

?>
		
<?php echo CHtml::beginForm(); ?>
<table align="center" style='font-size:10px'>
	<tr>
		<th>Предмет</th>
		<th>Январь</th>
		<th>Февраль</th>
		<th>Март</th>
		<th>Апрель</th>
		<th>Май</th>
		<th>Июнь</th>
		<th>Июль</th>
		<th>Август</th>
		<th>Сентябрь</th>
		<th>Октябрь</th>
		<th>Ноябрь</th>
		<th>Декабрь</th>
	</tr>
	<?php foreach($data as $subject=>$info): ?>
	<tr>
		<td><?php echo CHtml::encode($info['subject']);?></td>
		<?php
			for ($i = 1; $i <= 12; $i++){
				echo "<td>";
				//echo CHtml::textField($i.":".$info['subject'], $info[$i]['rate'], array("size" => 1));
				echo "<textarea rows=1 cols=1 name=".$i.":".$info['subject'].">".$info[$i]['rate']."</textarea>";
				if (isset($info[$i]['id'])){ 
					$image = CHtml::image(Yii::app()->request->baseUrl.'/images/delete.png');
					echo CHtml::ajaxLink($image, $this->createUrl("/diary/users/deleteRate/", array("id"=>$info[$i]['id'])), $ajaxOptions=array (
								        	'type'=>'POST',
								        	'dataType'=>'json',
								        	'success'=>'function(){ window.location.reload(); }'
								        )
					);
				}
				echo "</td>";
			}
		?>
	</tr>
	<?php endforeach; ?>
</table>
 
<?php echo CHtml::submitButton('Сохранить'); ?>
<?php echo CHtml::endForm(); ?>
<?php 
	//открываем сессию чтобы достать слово по которому фильтруем
	//чтобы общий список по возвращению из формы был отфильтрован автоматически, для удобства
	$session = new CHttpSession;
	$session->open();
	//чтобы из GET преобразовать в строку
	$_GET['Users'] = $session['user'];
	//убираем лишнее значение из GET
	unset($_GET['id']);
	//echo CHtml::button('Вернуться в отфильтрованный список', array('submit' => array('/diary/users/admin?'.http_build_query($_GET))));?>
