<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
?>
<div id="popup1" class="popup" style="display:none">
    <h1>Обратная связь</h1>
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'contact-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>
    <div class="row">
        <span>Email:</span>
        <?php echo '<i>' . $form->error($model, 'name') . '</i>'; ?>
        <?php echo $form->textField($model, 'name'); ?>
    </div>

    <div class="row">
        <span>Сообщение:</span>
        <?php echo '<i>' . $form->error($model, 'body') . '</i>'; ?>
        <?php echo $form->textArea($model, 'body', array('rows' => 4, 'cols' => 30)); ?>
    </div>
    <div class="clear"></div>
    <?php echo CHtml::submitButton('',array('id'=>'contact-link')); ?>
    <span class="close"></span>

    <div class="row buttons">

    </div>
    <?php $this->endWidget(); ?>
    <!-- form -->
</div>
