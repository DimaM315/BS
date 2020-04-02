<?php

namespace Model;

class EnterModel extends BaseModel
{
	public $nickname;
	public $password;


	public function __construct($nickname, $password, $name = '', $surname = '')
	{
		$this->nickname = $nickname;
		$this->password = $password;
		$this->name = $name;
		$this->surname = $surname;
	}
	

	public function getUserID()
	{
		$db = $this->connectBd();

		$query = $db -> prepare("SELECT id FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $this->nickname]);
		$person = $query->fetch();

			if($query->errorCode() != \PDO::ERR_NONE){
	            $info = $query->errorInfo();
	            echo implode('<br>', $info);
	            exit();
	        }

		$id = $person['id'];
		return $id;	
	}


	public function regUser()
	{
		$db = $this->connectBd();
		$query = $db -> prepare("INSERT INTO `users` (`nickname` , `password`, `name`, `surname`) VALUES (:nickname, :password, :name, :surname)");
		$query->execute([
			'nickname'=> $this->nickname , 
			'password' => $this->password, 
			'name' => $this->name, 
			'surname' => $this->surname
		]);

		if($query->errorCode() != \PDO::ERR_NONE){
	            $info = $query->errorInfo();
	            echo implode('<br>', $info);
	            exit();
	        }

		return true;
	}


	public function regValidate()
	{
		return true;
	}

	public function checkPass($paramText, $param, $checkParam)
	{
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT password FROM `users` WHERE `$paramText`= :param");
		$query->execute(['param'=> $param]);
		$person = $query->fetch();

			if($query->errorCode() != \PDO::ERR_NONE){
	            $info = $query->errorInfo();
	            echo implode('<br>', $info);
	            exit();
	        }

	    
	    return $person['password'] == $checkParam;
	}
}