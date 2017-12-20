<?php

error_reporting(E_ALL & ~E_NOTICE);

class AdminController extends UserController {

	function __construct($action) {
		global $rep,$views,$contents,$admin,$count;
		$errors = array();

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

	private function logout() : void {
		global $rep,$views,$contents;
		AdminModel::disconnect();
		header('Location: index.php');
	}

	private function viewFlux() : void {
		global $rep,$views,$contents,$admin,$count;
		$allFlux=AdminModel::getAllFlux();
		require($rep.$views['viewFlux']);
	}

	private function addFlux() : void {
		global $rep,$views,$contents,$admin,$count;
		$args=array($_POST['name'], $_POST['link']);

		if(Validation::areSet($args) && Validation::areNotEmpty($args)){
			try {
				AdminModel::addFlux($_POST['name'],$_POST['link']);
			}
			catch(Exception $e){
				if($e->getCode() == DUPLICATION)
					$exists=true;
				else
					$invalid = true;
			}
			$allFlux=AdminModel::getAllFlux();
			require($rep.$views['viewFlux']);
		}
	}

	private function updateFlux() : void {
		global $rep,$views,$contents,$admin,$count;
		$args=array($_GET['id'], $_POST['name'], $_POST['link']);

		if (Validation::areSet($args) && Validation::areNotEmpty($args)){
		    try {
					AdminModel::updateFlux($_GET['id'],$_POST['name'], $_POST['link']);
				}
				catch(Exception $e) {
					if($e->getCode() == DUPLICATION)
						$exists=true;
					else
						$invalid = true;
				}
				$allFlux=AdminModel::getAllFlux();
				require($rep.$views['viewFlux']);
    }
	}

	private function deleteFlux() : void {
		global $rep,$views,$contents,$admin,$count;

		if(isset($_GET['id']) && !empty($_GET['id'])){
			AdminModel::deleteFlux($_GET['id']);
			header('Location: index.php?action=viewFlux');
		}
	}
}
