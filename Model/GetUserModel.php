<?php

namespace Model;

class GetUserModel extends BaseModel
{
	public $id;


	public function __construct($id)
	{
		$this->id = $id;
		$this->FI = $this->findFIById($id);
		$this->nickname = $this->getNickname($id);
	}


	public function findFIById($id){ // ищит имя, фамилию по id. Возвращает строку 
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT name, surname FROM `users` WHERE `id`= :id");
		$query->execute(['id'=> $id]);
		
		$fi = $query->fetch();

		return $fi[0] .' '. $fi[1];
	}

	public function getContactsList(){
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT friends FROM `users` WHERE `id`= :id");
		$query->execute(['id'=> $this->id]);
		$mass_query = $query->fetch();
		$contactsListId = explode('-!!!-', $mass_query[0]);

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

	public function getArticlesList(){ // возвращает массив статей c id и title
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT id, title FROM `publications` WHERE `author`= :author");
		$query->execute(['author'=> $this->nickname]);
		$articlesList = $query->fetchAll();


	    return $articlesList;
	}

	public function getNickname($id)
	{
		$db = $this->connectBd();
		
		$query = $db -> prepare("SELECT nickname FROM `users` WHERE `id`= :id");
		$query->execute(['id'=> $id]);
		
		$nickname = $query->fetch();

		return $nickname[0];
	}

	public static function getIdByNickname($db, $nickname)
	{
		$query = $db -> prepare("SELECT id FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $nickname]);
		
		$id = $query->fetch();

		return $id[0];
	} 

	public function check_friend()
	{
		$i_am = $_COOKIE['nickname'];
		$db = $this->connectBd();

		$query = $db -> prepare("SELECT friends FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $i_am]);
		$mass_query = $query->fetch();
		
		$contacts = explode('-!!!-', $mass_query['friends']);

		for ($i=0; $i < count($contacts); $i++) { 
			if($contacts[$i] == $this->id){
				return true;
			}
		}
		return false;
		
	}

	public function check_yourPage()
	{
		return $this->nickname == $_COOKIE['nickname'];
	}
}