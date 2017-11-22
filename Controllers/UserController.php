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
					require($rep.$views['home']);
					break;


				case "login":
					$this->Login();
					break;

				default:
					$errors[] =	"Error bad PHP call";
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

	private function Login(){
		global $rep,$views;
	}
}
