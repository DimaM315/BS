<?php

namespace Controller;

use Model\UserModel;
use Model\GetUserModel;
use Model\ArticlesModel;

class PageController extends BaseController
{
	public $person;
	public $auto;

	public function __construct($nickname = '', $pass = '')
	{
		$this->person = $nickname == '' ? null  : new UserModel($nickname, $pass); // проверки чтоб создать helloPage без создания объекта
		$this->auto = $this->person == null ? false : $this->person->checkPass('nickname', $nickname);
	}


	public function HelloAction()
	{
		echo $this->render('view/helloPage.php');
	}

	public function MyPageAction()
	{
		
		echo $this->render('view/myPage.php',[
				'login' => $this->person->nickname,
				'contact_length' => count($this->person->getContactsList()),
				'contacts' => $this->person->getContactsList()

			]);
	}

	public function MyWorkAction()
	{
		echo $this->render('view/myWork.php',[
				'login' => $this->person->nickname,
				'title' => $this->person->myWork[0],
				'text' => $this->person->myWork[1]
			]);
	}

	public function UserPageAction()
	{
		if (is_numeric($_GET['userID'])){
			$user = new GetUserModel($_GET['userID']);

			echo $this->render('view/userPage.php',[
					'FI' => $user->FI,
					'my_Login' => $this->person->nickname,
					'check_friend' => $user->check_friend(),
					'check_yourPage' => $user->check_yourPage(),
					'auto' => $this->auto,
					'contacts' => $user->getContactsList(),
					'nickname' => $user->nickname,
					'articles' => $user->getArticlesList()
				]);
		}else{
			echo 'id_invalid';
		}
	}

	public function ArticlePageAction()
	{
		$obj = new ArticlesModel($_GET['articleID']);
		$author = $obj->article['author'];

		echo $this->render('view/articlePage.php',[
				'my_Login' => $this->person->nickname,
				'auto' => $this->auto,
				'title' => $obj->article['title'],
				'text' => $obj->article['text'],
				'author' => $author,
				'authorID' => GetUserModel::getIdByNickname($obj->connectBd(), $author)
			]);
	}
}