<?php
function __autoload($name)
{
	include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
}
$login = isset($_GET['nick']) ? $_GET['nick'] : '';
$pass = isset($_GET['pass']) ? $_GET['pass'] : '';


if($login !== '' && $pass !== ''){

$enter = new Model\EnterModel($login, $pass, $_GET['name'], $_GET['surname']); // name и surname, отправляются только при регистрации

	if(isset($_GET['reg'])){ // отправляeтся только при регистрации

		if($enter->regValidate()){
			$enter->regUser();
			echo '2'; // условный знак, что рег-ия успешна
		}else{
			echo $enter->regValidate();
		};
		exit();
	}



	$response = $enter->getUserID();
	
	if(is_numeric($response)){

		if($enter->checkPass('nickname', $login, $pass)){
			setcookie ("nickname", $login, time()+600);
			setcookie ("pass", $pass, time()+600);
			echo $response;
		}else{
			echo 'uncorrect password';
		};

	}else{
		echo 'not found';
	};

}else{
	echo 'error';
}


