<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $pass
 * @property string $name
 * @property string $secondName
 * @property string $thirdName
 * @property string $role
 * @property string $group
 * @property string $email
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, pass, name, secondName, thirdName, role, group, email', 'required'),
			array('login, pass, name, secondName, thirdName, role, group, email','length', 'max'=>55),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, pass, name, secondName, thirdName, role, group, email', 'safe', 'on'=>'search'),
			array('login', 'unique', 'message'=>'Запись с таким именем уже существует.'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Логин',
			'pass' => 'Пароль',
			'name' => 'Имя',
			'secondName' => 'Фамилия',
			'thirdName' => 'Отчество',
			'role' => 'Статус',
			'group' => 'Шифр группы',
			'email' => 'Почта',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{

 		$criteria=new CDbCriteria;
 		$criteria->compare('id',$this->id);
 		$criteria->compare('login',$this->login,true);
 		$criteria->compare('pass',$this->pass,true);
 		$criteria->compare('name',$this->name,true);
 		$criteria->compare('secondName',$this->secondName,true);
 		$criteria->compare('thirdName',$this->thirdName,true);
 		$criteria->compare('group',$this->group,true);
 		$criteria->compare('role',$this->role);
 		$criteria->compare('email',$this->email,true);
 		return new CActiveDataProvider($this, array(
 			'criteria'=>$criteria,
 			'sort'=>array(
	            'defaultOrder'=>'secondName ASC',
	        ),
	        'pagination'=>array(
	            'pageSize'=>10
	        ),
 		));
	}

	/**
	*Получение данных о оценках по месяцам и предметам
	*@param $id int id пользователя
	*если id пуст, то берется id из системы, т.е. id авторизованного пользователя(главная страница оценок)
	*если приходи id, значит надо взять данные по пришедшему id, т.е. правим оценки из админки
	*@return CArrayDataProvider или обычный массив в случае с пришедшим id
	*/
	public function getData($id = "")
	{
		$userID = 0;

		//если id пуст, то id из системы авторизованного юзера
		if ($id == "")
			$userID = Yii::app()->user->id; 
		else
			$userID = $id;

		//запрашиваем весь список предметов
		$subjects = Yii::app()->db->createCommand("SELECT id FROM subjects GROUP BY id")->queryAll();
		
		$result = Array();
		foreach ($subjects as $k=>$v){

			//заголовок предмета
			$subjTitle = Yii::app()->db->createCommand("SELECT title FROM subjects WHERE id = '".$v['id']."'")->queryAll();
			//оценки по предметам
			$rates =  Yii::app()->db->createCommand("SELECT rate, month, id FROM reportCard WHERE idSubject = '".$v['id']."' AND idUser = '".$userID."' ORDER BY month ASC")->queryAll();
			
			//месяца без оценок заполняем пустотой

			$cnt = count($rates);
			for ($i = $cnt; $i <= 11; $i++){
				$rates[$i]['rate'] = "";
			}
			
			//результирующий массив оценок по предметам у текущего пользователя
			$result[$k]['subjId'] = $v['id'];
			$result[$k]['subject'] = $subjTitle[0]['title'];
			$result[$k]['rates'] = $rates;
		

		}
		
		$resultFront = Array();
		//print_r($result);
		//переформируем массив для передачи на фронт		
		for ($i = 0; $i <= count($result)-1; $i++){
			$resultFront[$i]['subject'] = $result[$i]['subject'];

			//так же заполняем сначала пустотой как и выше
			for ($j = 1; $j <= 12 ; $j++){
				$resultFront[$i][$j] = "";
			}

			//записываем месяца и оценки к ним
			for ($j = 0; $j <= count($result[$i]['rates'])-1; $j++){
				//echo $result[$i]['rates'][$j]['id'];;
				$temp = $result[$i]['rates'][$j]['month'];
				$resultFront[$i][$temp]['rate'] = $result[$i]['rates'][$j]['rate'];
				$resultFront[$i][$temp]['id'] = $result[$i]['rates'][$j]['id'];
			}
		}
			
		//по разным запросам и отдаем по-разному сформированный результат
		if ($id == ""){
			$dataProvider=new CArrayDataProvider($resultFront, array(
        	'keyField'   => 'subjId',
        	'pagination'=>false));
			return $dataProvider; 
		}
		else
			return $resultFront;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
