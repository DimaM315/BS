<!DOCTYPE html>
<html>
<head>
	<title>BS - Приветствуем вас!</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/helloStyle.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
	<script type="text/javascript" src="./assets/js/helloScripts.js" defer></script>
	
</head>
<body>
	<div id="welcome_text">
		BitGoals was created by a team of veteran entrepreneurs from the sports and gaming industries, that joined forces in order to create one of the biggest, most fundamental projects in the sports, gaming and crypto worlds. Each team member brought his own experience, ideas and passions to the project, creating the unique and ambitious combination that you can see today.
	</div>

	<div id="log_wrap">
		<div class="btn" id="login">Авторизация</div>
		<div class="btn" id="reg">Регистрация</div>
	</div>

	<div id="form_auto" class="form">Авторизация<br><br>
		Введите свой логин: <input type="text" id="auto_login" class="input"><br>
		Введите свой пороль: <input type="text" id="auto_pass" class="input"><br>
		<div class="btn" id="enter">Войти</div>
	</div>
	
	<div id="form_reg" class="form"><strong>Регистрация</strong><br><br>
		Придумайте себе логин: <input type="text" id="reg_login" class="input"><br>
		Придумайте себе пороль: <input type="text" id="reg_pass" class="input"><br>
		Введите своё имя: <input type="text" id="reg_name" class="input"><br>
		Введите свою фамилию: <input type="text" id="reg_surname" class="input"><br>
		<div class="btn" id="reg_order">Зарегистрироваться</div>
	</div>
</body>
</html>