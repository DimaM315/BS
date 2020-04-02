<!DOCTYPE html>
<html>
<head>
	<title>BS - Стараница пользователя</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/userPage.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
	<script type="text/javascript" src="./assets/js/userPageScripts.js" defer></script>
</head>
<body>

	<?if($auto): ?>
		<div id="header">
			<div id="my_work" class="section"><a href="\?myWork=true">Мой работы</a></div>
			<div id="hover_el" class="section"><a href="\?">Мой логин: <?=$my_Login;?></a></div>
		</div>
	<?endif;?>

	<div id="feed">
		<h2><?=$FI?> (<?=$nickname?>)</h2>		
	</div>

	<?if($auto): ?>
		<div id="share_btn">
			<?if($check_yourPage):?>
				<button class="btn yourPage">Ваш профиль</button>
			<?elseif(!$check_friend):?>
				<button class="btn" id="addCont">Добавить в контакты</button>
			<?else:?>
				<button class="btn friend">Убрать из контактов</button>
			<?endif;?>

			<button class="btn">Написать сообщение</button>
		</div>
	<?endif;?>


	<div id="sub_contact">
		<h2>Контакты</h2>
		<?php foreach($contacts as $contact): ?>			
			<div class="contact">
				<div class="shape"></div> 
				<div class="contact_name">
					<a href="index.php?userID=<?=$contact['id'];?>"><?=$contact['FI'];?></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div id="user_works">
		<h2>Статьи пользователя</h2>
		<?php foreach($articles as $article): ?>
			<div class="article">
				<a href="?articleID=<?=$article['id']?>"><?=$article['title']?></a> <button class="btn">Нравиться</button>
			</div>
		<?php endforeach; ?>
	</div>

</body>
</html>