<?php

function __autoload($name)
{
	include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
}

$do = $_GET['interaction'];
$obj = new Model\InteractionModel();

if(!$obj->checkPass('nickname', $_COOKIE['nickname'])){
	echo $_COOKIE['nickname'];
	exit();
}

$obj->$do($_GET['report']);