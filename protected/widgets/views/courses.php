<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
?>

<div id="popup2" class="popup" style="display:none">
    <h1>Записаться на курсы</h1>
    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'courses-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )
    ); ?>

    <div class="row">
        <span>Email:</span>
        <?php echo '<i>' . $form->error($model, 'name') . '</i>'; ?>
        <?php echo $form->textField($model, 'name'); ?>
    </div>

    <div class="row">
        <span>Телефон для связи:</span>
        <?php echo '<i>' . $form->error($model, 'phone') . '</i>'; ?>
        <?php echo $form->textField($model, 'phone'); ?>
    </div>

    <div class="row">
        <span>Интересующий язык:</span>
        <?php echo '<i>' . $form->error($model, 'language') . '</i>'; ?>
        <?php echo $form->dropDownList(
            $model,
            'language',
            array(
                'Английский' => 'Английский',
                'Немецкий' => 'Немецкий',
                'Испанский' => 'Испанский',
                'Китайский' => 'Китайский',
                'Французский' => 'Французский',
            )
        ); ?>
    </div>

    <div class="row">
        <span class="margin-bottom30">Оцените свой уровень:</span>
        <?php echo '<i>' . $form->error($model, 'level') . '</i>'; ?>
        <?php echo $form->dropDownList(
            $model,
            'level',
            array(
                'Нулевой' => 'Нулевой',
                'Базовый' => 'Базовый',
                'Ниже среднего' => 'Ниже среднего',
                'Средний' => 'Средний',
                'Выше среднего' => 'Выше среднего',
            )
        ); ?>
    </div>

    <div class="clear"></div>
    <?php echo CHtml::submitButton('',array('id'=>'course-link')); ?>
    <span class="close"></span>
    <?php $this->endWidget(); ?>
    <!-- form -->
</div>
