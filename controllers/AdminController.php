<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 29/11/17
 * Time: 14:08
 */
class AdminController extends UserController {

	function __construct($action) {
		global $rep,$views,$contents;
		$errors = array();
		$action=Cleaner::CleanString($action);

		try {

			switch($action) {

				case NULL:
					$this->displayAllNews();
					break;

				case "logoff":
					$this->logoff();
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

	private function logoff() {
		global $rep,$views,$contents;
		AdminModel::disconnect();
		$this->displayAllNews();
	}
}