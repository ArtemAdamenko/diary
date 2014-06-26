<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
$roles = Array('manager' => 'Менеджер', 'user' => 'Ученик');
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'Логин');?>
		<?php echo $form->textField($model,'login'); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Пароль');?>
		<?php echo $form->passwordField($model,'pass'); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Имя');?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Отчество');?>
		<?php echo $form->textField($model,'thirdName'); ?>
		<?php echo $form->error($model,'thirdName'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Фамилия');?>
		<?php echo $form->textField($model,'secondName'); ?>
		<?php echo $form->error($model,'secondName'); ?>
	</div>
	<div class="row">
		<?php 
		 echo $form->labelEx($model,'Шифр группы');;
		 echo $form->textField($model,'group'); 
		 echo $form->error($model,'group');
		  ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Почта');?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php 
		if (Yii::app()->user->checkAccess('admin') && $check != true){
			echo $form->labelEx($model,'Роль');
			echo $form->dropDownList($model,'role', $roles); 
			echo $form->error($model,'role');
		 } ?>
	</div>
	<br>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->