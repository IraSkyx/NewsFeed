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


				case "login":
					$this->Login();
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

	private function DisplayAllNews(){
			global $rep,$views,$contents;
			$md = new Modele();
			$allNews = $md->getAllNews();
			require($rep.$views['home']);
	}
}
