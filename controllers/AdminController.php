<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 29/11/17
 * Time: 14:08
 */
class AdminController extends UserController {

	function __construct($action) {
		global $rep,$views,$contents, $admin;
		$errors = array();
		$action=Cleaner::CleanString($action);

		try {

			switch($action) {

				case NULL:
					$this->displayAllNews();
					break;

				case "addFlux":
					$this->addFlux();
					break;

				case "search":
					$this->search();
					break;

				case "logout":
					$this->logout();
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

	private function logout() {
		global $rep,$views,$contents;
		AdminModel::disconnect();
		$this->displayAllNews();
	}

	private function addFlux() {
		global $rep,$views,$contents;
		//To be implemented
	}
}
