<?php

namespace Model;

class InteractionModel extends BaseModel
{
	public function __construct()
	{

	}


	public function article_like($id)
	{

	}	

	public function add_contact($id)
	{
		$db = $this->connectBd();

		$query = $db -> prepare("SELECT friends FROM `users` WHERE `nickname`= :nickname");
		$query->execute(['nickname'=> $_COOKIE['nickname']]);
		$contacts = $query->fetch();

		$query = $db -> prepare("UPDATE `users` SET `friends`=:contacts WHERE `nickname` = :nickname");
		$query->execute([
			'contacts'=> $contacts['friends'] . '-!!!-' . $id, 
			'nickname' => $_COOKIE['nickname']
		]);
	}	

	public function sent_message($report)
	{
		$report_mess = explode('-!!!-', $report);
		
		$from = $report_mess[0];
		$message = $report_mess[1];

	}

	public function checkPass($paramText, $param)
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

	    
	    return $person['password'] == $_COOKIE['pass'];
	}

	
}