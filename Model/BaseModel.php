<?php

namespace Model;

abstract class BaseModel
{
	public function __construct()
	{

	}


	public function connectBd()
	{
		$db = new \PDO("mysql:host=localhost;dbname=BS_compilation", "root", "");
		$db->exec("SET NAMES UTF8");
		return $db;
	}	
}