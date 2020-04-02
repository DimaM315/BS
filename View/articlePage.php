<!DOCTYPE html>
<html>
<head>
	<title>BS - Страница пользователя</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/articlePage.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
	<script type="text/javascript" src="./assets/js/articlePageScripts.js" defer></script>
</head>
<body>

	<?if($auto): ?>
		<div id="header">
			<div id="my_work" class="section"><a href="\?myWork=true">Мой работы</a></div>
			<div id="hover_el" class="section"><a href="\?">Мой логин: <?=$my_Login;?></a></div>
		</div>
	<?endif;?>

	<div id="feed">
		<h2><?=$title?></h2>	
		<div class="article"><?=$text?></div>
		<strong>Автор:</strong> <a href="?userID=<?=$authorID?>"><em><?=$author?></em></a> 
		<?if($auto): ?>
			<button class="btn">Нравиться</button>	
		<?endif;?>
	</div>
	
	
</body>
</html>