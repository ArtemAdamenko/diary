<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Восстановление пароля';
?>

<h1>Восстановление пароля</h1><br>

<p>Введите вашу почту: </p><br>

<div class="form">
<?php if (isset($error))
	echo $error;
	?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Почта');?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Восстановить'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
