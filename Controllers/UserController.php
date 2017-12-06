<?php

error_reporting(E_ALL & ~E_NOTICE);

class UserController {

	function __construct($action) {
		global $rep,$views,$contents;
		$errors = array();
		$action=Cleaner::cleanString($action);

		try {

			switch($action) {

				case NULL:
					$this->displayAllNews();
					break;

				case "search":
					$this->search();
					break;

				case "login":
					$this->login();
					break;

				case "signin":
					$this->signIn();
					break;

				case "logoff":
				$this->logOff();
				break;

				default:
					$errors[] =	"Bad request";
					require ($rep.$views['error']);
			}
		}
		catch (Exception $e){
			$errors[] =	"Error : " . $e;
			require ($rep.$views['error']);
		}
		exit(0);
	}

	private function login(){
		global $rep,$views,$contents;
		require($rep.$views['login']);
	}

	private function signIn(){
		global $rep,$views,$contents;
		if(isset($_POST['inputUsername']) && isset($_POST['inputPassword'])){
			$username=Cleaner::CleanString($_POST['inputUsername']);
			$password=Cleaner::CleanString($_POST['inputPassword']);
			if(UserModel::login($username, $password))
					header('Location: index.php');
			$wrong=true;
			require($rep.$views['login']);
		}

	}

	private function search(){
		global $rep,$views,$contents;
		if(isset($_POST['keyWord']) && !empty($_POST['keyWord'])){
			$keyWord=Cleaner::CleanString($_POST['keyWord']);
			$allNews=UserModel::getNewsByKeyWord($keyWord);
			$nbNews=count($allNews);
			require($rep.$views['home']);
		}
		else
			header('Location: index.php');
	}

	private function displayAllNews(){
			global $rep,$views,$contents;
			$page=Cleaner::CleanInt($_GET['page']);
			$allNews = UserModel::getAllNews($page);
			$nbNews = UserModel::getNbNews();
			require($rep.$views['home']);
	}
}
