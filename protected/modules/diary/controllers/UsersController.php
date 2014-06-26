<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				//'users'=>array('*'),
				'roles' => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				//'users'=>array('@'),
				'roles' => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','rates','create', 'deleteRate','back'),
				//'users'=>array('admin', 'manager'),
				'roles' => array('admin', 'manager'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				//'users'=>array('admin'),
				'roles' => array('admin', 'manager'),
			),
			array('deny',  // deny all users
				//'users'=>array('*'),
				'roles' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionDeleteRate($id){
		$command = Yii::app()->db->createCommand();
		$res = $command->delete("reportCard", 'id=:id', array(':id' => $id));
		echo $res;
		//Yii::app()->getRequest()->getHostInfo()
	}

	/**
	*Выставление выдача оценок
	*@param id int идентификатор пользователя
	*/
	public function actionRates($id)
	{	
		$id = trim($id, "=");
		//если пришла форма с оценками
		if ($_POST){
			foreach ($_POST as $k=>$rate){
				//echo $k;
				//проверка на пустые значения из таблицы и на id кнопки, она нам не нужна в бд
				if ($rate != "" && !substr_count($k, 'yt')){
					//отделяем порядковый номер месяца от названия предмета, так сделано на фронте
				//	echo $k;
					$monthToSubject = spliti(":", $k);
					
					$month = $monthToSubject[0];
					$subj = $monthToSubject[1];

					//если название предмета состоит более чем из 1 слова то в пост приходит название с '_'
					//тут надо предусмотреть любое кол-во слов в предмете
					if (substr_count($subj, "_")){
						$temp = spliti("_", $subj);
						$subj = $temp[0]." ".$temp[1];
					}

					//зибираем id предмета по имени
					$subjID = Yii::app()->db->createCommand("SELECT id FROM subjects WHERE title = '".$subj."'")->queryAll();
					$subj = $subjID[0]['id'];

					//стояла ли уже оценка по этим данным
					$oldRate = Yii::app()->db->createCommand("SELECT rate FROM reportCard WHERE idUser = ".$id." AND idSubject = ".$subj." AND month = ".$month."")->queryAll();

					//если оценки нет то вставляем
					if (!isset($oldRate[0]['rate'])){
						Yii::app()->db->createCommand()->insert('reportCard', array(
										'idUser' => $id,
										'idSubject' => $subj,
										'rate' => $rate,
										'month' => $month
									));
					}else{
						//если оценка есть - обновляем ее
						Yii::app()->db->createCommand()->update('reportCard', array(
										'rate' => $rate,
									),'idUser = :idUser AND idSubject = :idSubject AND month = :month', array(':idUser' => $id, ':idSubject' => $subj, ':month' => $month));
					}
				}
				
			}
		}

		$user = new Users();
		$data = $user->getData($id);

		$this->render('rates',array(
			'model' => $this->loadModel($id),
			'data' => $data
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			//print_r($model->attributes);
			$model->attributes=$_POST['Users'];
			//print_r($model->attributes);
			if($model->save())
			//	print_r($_POST);
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$check = false;
		if ($model->role == 'admin')
			//print_r($model->role);
			$check = true;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
				$model->attributes=$_POST['Users'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
		}
		$this->render('update',array(
			'model'=>$model,
			'check' => $check,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		//if (Yii::app()->user->checkAccess('admin'))
		$role = Yii::app()->db->createCommand("SELECT role FROM users WHERE id = '".$id."'")->queryAll();
		//print_r($role);
		if ($role[0]['role'] == 'user')
			$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	    public function actionBack(){
	    	$model=new Users('search');
        	$session = new CHttpSession;
        	$session->open();
        	print_r($session['user']);
        	$this->render('admin',array(
				'model'=>$model,
			));
    }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Subjects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Subjects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}