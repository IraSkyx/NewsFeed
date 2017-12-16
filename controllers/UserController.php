<?php

error_reporting(E_ALL & ~E_NOTICE);

class UserController {
	function __construct($action) {

		global $rep,$views,$contents;
		$errors = array();

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
					$this->signin();
					break;

				default:
					$errors[] =	"Bad request";
					require($rep.$views['error']);
			}
		}
		catch (Exception $e) {
			$errors[] =	"Error : " . $e;
			require($rep.$views['error']);
		}
		exit(0);
	}
	protected function login() : void {
		global $rep,$views,$contents,$admin;
		require($rep.$views['login']);
	}
	protected function signin() : void {
		global $rep,$views,$contents,$admin;
		if(isset($_POST['inputUsername']) && isset($_POST['inputPassword'])){
			if(AdminModel::connect($_POST['inputUsername'], $_POST['inputPassword']) == false) {
				$wrong=true;
				require($rep.$views['login']);
			}
			else
				header('Location: index.php');
		}
	}
	protected function search() : void {
		global $rep,$views,$contents,$admin,$nbNewsPerPage;

		if(isset($_GET['keyWord']) && !empty($_GET['keyWord'])){
			$page=Cleaner::cleanInt($_GET['page']);
			$keyWord=Cleaner::cleanString($_GET['keyWord']);

			$allNews=UserModel::getNewsByKeyWord($keyWord, $page);
			$nbNews=UserModel::getNbNewsByKeyword($keyword);

			$nbPageBeforeAndAfterCurrent=5;
			$request= "action=search&keyWord=".$keyWord.'&';
			$limitMin= $page-$nbPageBeforeAndAfterCurrent <= 0 ? $page-1 : $nbPageBeforeAndAfterCurrent;
			$limitMax= $page+$nbPageBeforeAndAfterCurrent > ceil($nbNews / $nbNewsPerPage) ? (ceil($nbNews / $nbNewsPerPage)-$page) : $nbPageBeforeAndAfterCurrent;
			require($rep.$views['home']);
		}
		else
			header('Location: index.php');
	}
	protected function displayAllNews() : void {
			global $rep,$views,$contents,$admin,$nbNewsPerPage;

			$page=Cleaner::cleanInt($_GET['page']);

			$allNews = UserModel::getAllNews($page);
			$nbNews=UserModel::getNbNews();

			$nbPageBeforeAndAfterCurrent=5;
			$request= "";
			$limitMin= $page-$nbPageBeforeAndAfterCurrent <= 0 ? $page-1 : $nbPageBeforeAndAfterCurrent;
			$limitMax= $page+$nbPageBeforeAndAfterCurrent > ceil($nbNews / $nbNewsPerPage) ? (ceil($nbNews / $nbNewsPerPage)-$page) : $nbPageBeforeAndAfterCurrent;
			require($rep.$views['home']);
	}
}
