<!DOCTYPE html>
<html>
<head>
	<title>BS - Моя страница</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/myPage.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" ></script>
	<script type="text/javascript" src="./assets/js/myPageScripts.js" defer></script>
</head>
<body>
	<div id="header">
		<div id="my_work" class="section"><a href="\?myWork=true">Мой работы</a></div>
		<div id="hover_el" class="section">Мой логин: <?=$login;?></div>
		
		<div class="sub_section">
			<div class="section" id="my_contact">Мой контакты(<?=$contact_length?>)</div> <div class="section" id="my_liked">Понравившиеся статьи(2)</div> <div class="section" id="my_message">Сообщения(4)</div>
		</div>
	</div>


	<div id="feed">
		
	</div>

	<div id="sub_message">
		<div class="message">Иван Иванов<span class="message_attr">(1)</span><br><hr>
			<span class="message_text">Привет мир! Как твои дела?</span>
		</div>
		<div class="message">Имя Фамилия<span class="message_attr">(4)</span><br><hr>
			<span class="message_text">gfdg gfdgbv nng grey bbxd re43 gd</span>
		</div>
		<div class="message">Александр Пушкин<span class="message_attr">(1)</span><br><hr>
			<span class="message_text">паак пвапуцк 23п ясап пкуйц исмишшт ккнунр иаппато пвапку йурл шмарво иваро ыйее555 рео777</span>
		</div>
	</div>


	<div id="sub_liked">
		<a href='#'>"Крещение руси"</a><br>
		<a href='#'>"Мартин Иден"</a><br>
		<a href='#'>"Замок"</a><br>
		<a href='#'>"Мёртвые души"</a><br>
	</div>


	<div id="sub_contact">
		<?php foreach($contacts as $contact): ?>
			<div class="contact">
				<div class="online"></div> 
				<div class="contact_name">
					<a href="index.php?userID=<?=$contact['id'];?>"><?=$contact['FI'];?></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	
</body>
</html>