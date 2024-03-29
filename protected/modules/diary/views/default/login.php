<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Авторизация';
?>

<h1>Авторизация</h1><br>

<p>Пожалуйста, заполните следующий поля для входа: </p><br>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Логин');?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Пароль');?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'Запомнить'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Войти'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::button('Забыли пароль?', array('submit' => array('/diary/default/losepass'))); ?>
	</div>
