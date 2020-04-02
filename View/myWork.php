<!DOCTYPE html>
<html>
<head>
	<title>BS - Моя работа</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/myWork.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
	<script type="text/javascript" src="./assets/js/myWorkScripts.js" defer></script>
</head>
<body>
	<div id="header">
		<div id="my_work" class="section">Мои работы</div>
		<div id="hover_el" class="section"><a href="?">Мой nickname: <?=$login?></a></div>
		
	</div>


	<div id="feed">
			<input type="text" id="title" class="input" value="<?=$title?>"><span class="error" id="error_title">Название не длиннее 45 символов!</span><br><br>
			<textarea id="text"><?=$text?></textarea><span class="error" id="error_text">Текст не короче 100 символов!</span>

		<hr><em>Автор: <?=$login?></em>
		<button class="btn" id="done">Опубликовать</button>
		<button class="btn" id="save">Сохранить</button>

	</div>
</body>
</html>