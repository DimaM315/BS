<?php
	function __autoload($name)
	{
		include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
	}

$obj = new Controller\PageController($_COOKIE['nickname'], $_COOKIE['pass']);


if(isset($_GET['myWork']) and $obj->auto){

	$action = 'MyWorkAction';

}else if(isset($_GET['userID'])){

	$action = 'UserPageAction';

}else if (isset($_GET['articleID'])){

	$action = 'ArticlePageAction';

}else{

	$action = $obj->auto ? 'MyPageAction' : 'HelloAction';
	
};

$obj->$action();
