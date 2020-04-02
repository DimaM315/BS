<?php

namespace Model;

class ArticlesModel extends BaseModel
{
	public $articles;
	public $title;
	public $text;

	public function __construct($id = 0, $title = '', $text = '')
	{
		$this->article = $this->getArticles($id);
		$this->title = $title;
		$this->text = $text;
		$this->author = $author;
	}
	

	public function getArticles($id)
	{
		if($id == 0){return 'error';};
		$db = $this->connectBd();

		$query = $db -> prepare("SELECT * FROM `publications` WHERE `id`= :id");
		$query->execute(['id'=> $id]);
		$article = $query->fetch();

			if($query->errorCode() != \PDO::ERR_NONE){
	            $info = $query->errorInfo();
	            echo implode('<br>', $info);
	            exit();
	        }

		return $article;	
	}

	public function addArticles()
	{
		$validate = $this->validateArticle();
		if(!$validate){return $validate;};


		$db = $this->connectBd();

		$query = $db -> prepare("INSERT INTO publications (`author`,`title`,`text`) VALUES (:author, :title, :text)");
		$query->execute([
				'author' => $_COOKIE['nickname'],
				'title' => $this->title,
				'text' => $this->text
			]);

			if($query->errorCode() != \PDO::ERR_NONE){
	            $info = $query->errorInfo();
	            echo implode('<br>', $info);
	            exit();
	        }
	    $this->saveWork(''); //Очищаем стролбец my_work

		return 2;
	}

	public function saveWork($work)
	{
		$db = $this->connectBd();

		$query = $db -> prepare("UPDATE `users` SET `my_work`= :myWork WHERE `nickname` = :nickname");
		$query->execute([
				'myWork' => $work,
				'nickname'=> $_COOKIE['nickname']
			]);

		return true;
	}

	private function validateArticle()
	{
		if(strlen($this->title) > 45){
			return 'error';
		};
		if(strlen($this->text) < 100){
			return 'error';
		};

		return true;
	}
}
