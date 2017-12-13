<?php

error_reporting(E_ALL & ~E_NOTICE);

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

				case "viewFlux":
					$this->viewFlux();
					break;

				case "addFlux":
					$this->addFlux();
					break;

				case "updateFlux":
					$this->updateFlux();
					break;

				case "deleteFlux":
					$this->deleteFlux();
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
		header('Location: index.php');
	}

	private function viewFlux() {
		global $rep,$views,$contents,$admin;
		$allFlux=AdminModel::getAllFlux();
		require($rep.$views['viewFlux']);
	}

	private function addFlux() {
		global $rep,$views,$contents,$admin;
		$args=array($_POST['name'], $_POST['link']);
		if(Validation::AreSet($args) && Validation::AreNotEmpty($args) ){
			try {
				AdminModel::addFlux($_POST['name'],$_POST['link']);
			}
			catch(Exception $e) {
				$exists=true;
                $allFlux=AdminModel::getAllFlux();
				require($rep.$views['viewFlux']);
			}
			header('Location: index.php?action=viewFlux');
		}
	}

	private function updateFlux() {
		global $rep,$views,$contents,$admin;
		if (isset($_POST['name']) && isset($_POST['link']) && !empty($_POST['name']) && !empty($_POST['link'])){
		    AdminModel::updateFlux($_POST['name'], $_POST['link']);
            header('Location: index.php?action=viewFlux');
        }
	}

	private function deleteFlux() {
		global $rep,$views,$contents,$admin;
		if(isset($_GET['link']) && !empty($_GET['link'])){
			AdminModel::deleteFlux($_GET['link']);
			header('Location: index.php?action=viewFlux');
		}
	}
}
