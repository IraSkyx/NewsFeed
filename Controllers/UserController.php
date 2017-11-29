<?php

error_reporting(E_ERROR);

class UserController {

	function __construct() {
		global $rep,$views,$contents;
		$errors = array();

		try {
			$action=$_REQUEST['action'];

			switch($action) {

				case NULL:
					$this->DisplayAllNews();
					break;


				case "search":
					$this->Search();
					break;

				default:
					$errors[] =	"Bad request";
					require ($rep.$views['error']);
			}
		}
		catch (PDOException $ex) {
			$errors[] =	"Database error " . $ex;
			require ($rep.$views['error']);
		}
		catch (Exception $e){
			$errors[] =	"Error : " . $e;
			require ($rep.$views['error']);
		}
		exit(0);
	}

	private function Search(){
		global $rep,$views,$contents;
		$keyWord=Cleaner::CleanString($_POST['keyWord']);
		$allNews=Model::getNewsByKeyWord($keyWord);
		$nbNews=count($allNews);
		require($rep.$views['home']);
	}

	private function DisplayAllNews(){
			global $rep,$views,$contents;
			$page=Cleaner::CleanInt($_GET['page']);
			$allNews = Model::getAllNews($page);
			$nbNews = Model::getNbNews();
			require($rep.$views['home']);
	}
}
