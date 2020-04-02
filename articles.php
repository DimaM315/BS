<?php
function __autoload($name)
{
	include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
}

$articles = new Model\ArticlesModel($_GET['id'], $_GET['title'], $_GET['text']);

if(isset($_GET['id'])){
	$articles = new Model\ArticlesModel($_GET['id']);
	echo json_encode($articles->article);

}elseif(isset($_GET['save'])){
	$articles->saveWork($_GET['work']);
	echo 'save';
}else{
	
	echo $articles->addArticles();
};

