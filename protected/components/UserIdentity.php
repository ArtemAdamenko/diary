<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

	private $_id;
	private $_secondName;
	private $_thirdName;
	private $_username;

	public function authenticate()
	{
		$record=Users::model()->findByAttributes(array('login'=>$this->username));
		if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!CPasswordHelper::verifyPassword($this->password,CPasswordHelper::hashPassword($record->pass)))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id=$record->id;
			//$this->_username = $record->name;
			//$this->_secondName = $record->secondName;
			//$this->_thirdName = $record->thirdName;
            $this->setState('id', $record->id);
            $this->setState('name', $record->name);
            $this->setState('secondName', $record->secondName);
            $this->setState('thirdName', $record->thirdName);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
    {
        return $this->_id;
    }

    public function getThirdName(){
    	return $this->_thirdName;
    }
    public function getSecondName(){
    	return $this->_secondName;
    }
    public function getUsername(){
    	return $this->_username;
    }
}