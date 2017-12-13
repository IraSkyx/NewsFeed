<?php

class AdminModel {

	public static function connect($username, $password) : bool {
		$username=Cleaner::CleanString($username);
		$password=Cleaner::CleanString($password);

		$admin=(new AdminGateway())->GetAdmin($username, hash("sha512", $password));

		if($admin == null)
			return false;

		$_SESSION['username']=$admin->getUsername();
		$_SESSION['password']=$admin->getPassword();
		return true;
	}

	public static function disconnect() : void {
		session_unset();
		session_destroy();
		$_SESSION=array();
	}

	public static function isAdmin() {
			if(isset($_SESSION['username']) && isset($_SESSION['password']))
				return new Admin(Cleaner::CleanString($_SESSION['username']), Cleaner::CleanString($_SESSION['password']));
	    return null;
	}

	public static function getAllFlux() : array {
		return (new FluxGateway())->GetAllFlux();
	}

	public static function addFlux(string $name, string $link) {
		$name=Cleaner::CleanString($name);
		$link=Cleaner::CleanString($link);
		return (new FluxGateway())->Insert($name,$link);
	}

	public static function updateFlux(string $name, string $link) {
		$name=Cleaner::CleanString($name);
		$link=Cleaner::CleanString($link);
		return (new FluxGateway())->Update($name,$link);
	}

	public static function deleteFlux(string $link) {
		$link=Cleaner::CleanString($link);
		return (new FluxGateway())->Delete($link);
	}
}
