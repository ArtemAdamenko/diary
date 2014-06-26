<?php
class CoursesWidget extends CWidget
{
    public function init()
    {
        // этот метод будет вызван внутри CBaseController::beginWidget()
    }

    public function run()
    {
        // @TODO Сделать
        $model = new CoursesForm;
        if (isset($_POST['CoursesForm'])) {
            $model->attributes = $_POST['CoursesForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode('Запись на курсы') . '?=';
                $headers = "From: $name <{$model->name}>\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, "
                    Меня зовут:  $model->name \n
                    Мой телефон:  $model->phone \n
                    Я хочу изучать $model->language язык \n
                    У меня  $model->level уровень \n
                ", $headers);
            }
        }
        $this->render('courses', array('model' => $model));
    }
}
