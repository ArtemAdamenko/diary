<?php

class SiteController extends Controller
{
    public $layout = '//layouts/column1';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->layout = '//layouts/main';
        //$this->render('index');
        $this->redirect($this->createUrl("/diary/default/login"));

    }

    public function actionAbout()
    {
        $this->render('about');
    }

    public function actionPrograms()
    {
        $this->render('programs');
    }

    public function actionChildrenProgram()
    {
        $this->render('children-program');
    }

    public function actionAdultProgram()
    {
        $this->render('adult-program');
    }

    public function actionNews()
    {
        $this->render('news');
    }

    public function actionCamps()
    {
        $this->render('camps');
    }

    public function actionWinterCamp()
    {
        $this->render('winter-camp');
    }

    public function actionCorp()
    {
        $this->render('corp');
    }

    public function actionEngCamps()
    {
        $this->render('eng-camps');
    }

    public function actionCityandGuilds()
    {
        $this->render('city-and-guilds');
    }

    public function actionPhotos()
    {
        $this->render('photos');
    }

    public function actionTeachers()
    {
        $this->render('teachers');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode('Требуется помощь') . '?=';
                $headers = "From: $name <{$model->name}>\r\n" .
                    "Reply-To: {$model->email}\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Вы отметим вам так скоро, как это возможно');
                die();
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionDairy(){

        if (Yii::app()->user->checkAccess('manager'))
                $this->redirect('/admin');
            else
                $this->render('dairy');
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}
