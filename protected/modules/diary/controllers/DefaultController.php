<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');

	}




	public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect($this->createUrl('/diary/default/dairy'));
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    public function actionDairy(){

        if (Yii::app()->user->checkAccess('manager'))
                $this->redirect($this->createUrl('/diary'));
            else
                $this->render('dairy');
    }

	public function actionAdmin()
	{
		$this->render('adminSubjects');
	}

    /**
    * Генерациая пароля
    * @return string password
    */
    private function generatePass(){
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=10; 
        $size=StrLen($chars)-1; 
        $password=null; 
        while($max--)
            $password.=$chars[rand(0,$size)]; 
        return $password;
    }

    public function actionLosepass(){
        $model=new Users;

        if (isset($_POST['Users'])){
            $email = $_POST['Users']['email'];
            $idUser = Yii::app()->db->createCommand("SELECT id FROM users WHERE email = '".$email."'")->queryAll();
            if (isset($idUser[0]['id'])){
                $newPass = $this->generatePass();
                Yii::app()->db->createCommand()->update('users', array(
                                        'pass' => $newPass,
                                    ), "id=:id" , array(':id'=>$idUser[0]['id']));
                mail($email, "Новый Пароль", $newPass);
                $this->redirect('/diary/default/login');
            }else{
                $this->render('losepass',array(
                    'model'=>$model,
                    'error' => "Пользователя с такой почтой не существует",
                ));
            }
        }
        $this->render('losepass',array(
            'model'=>$model,
        ));
    }
}