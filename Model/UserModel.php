<?php

namespace Model;

class UserModel extends BaseModel
{
	public $nickname;
	public $password;

	public $myWork;


	public function __construct($nick, $password)
	{
		$this->nickname = $nick;
		$this->password = $password;

		$this->myWork = $this->getMyWork();
	}
	

	public function getMessages()
	{
		$db = $this->connectBd();

		$query = $db -> prepare("SELECT messages FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $this->nickname]);
		$message = $query->fetch();

		$bloksMess = explode('-|=|-', $message[0]); // разбиваем строку в бд на блоки одного сообщения

		return $bloksMess;
	}


	public function getContactsList(){
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT friends FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $this->nickname]);
		$string = $query->fetch();
		$contactsListId = explode('-!!!-', $string[0]);

			if($query->errorCode() != \PDO::ERR_NONE){
	            $info = $query->errorInfo();
	            echo implode('<br>', $info);
	            exit();
	        }
	    $contactsListName = [];

	    for ($i=0; $i < count($contactsListId); $i++) { 
	    	$contact['id'] = $contactsListId[$i];
	    	$contact['FI'] = $this->findFIById($contactsListId[$i]);

	    	$contactsListName[] = $contact;
	    }

	    return $contactsListName;
	}

	public function getMyWork()
	{
		$db = $this->connectBd();

		$query = $db -> prepare("SELECT my_work FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $this->nickname]);
		$work = $query->fetch();

		$myWork = explode('-!!!-', $work[0]);

		return $myWork;
	}


	protected function findFIById($id){ // ищит имя, фамилию по id. Возвращает строку 
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT name, surname FROM `users` WHERE `id`= :id");
		$query->execute(['id'=> $id]);
		
		$fi = $query->fetch();

		return $fi[0] .' '. $fi[1];
	}

	public function checkPass()
	{
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT password FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $this->nickname]);
		$person = $query->fetch();

			if($query->errorCode() != \PDO::ERR_NONE){
	            $info = $query->errorInfo();
	            echo implode('<br>', $info);
	            exit();
	        }

	    
	    return $person['password'] == $this->password;
	}

}