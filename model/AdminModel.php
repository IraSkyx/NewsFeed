<?php

class AdminModel {

	public static function connect($username, $password) : bool {
		$username=Cleaner::cleanString($username);
		$password=Cleaner::cleanString($password);

		$admin=(new AdminGateway())->getAdmin($username, hash("sha512", $password));

		if($admin == null)
			return false;

		$_SESSION['id']=$admin->getId();
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
			if(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['password']))
				return new Admin(Cleaner::CleanInt($_SESSION['id']), Cleaner::cleanString($_SESSION['username']), Cleaner::cleanString($_SESSION['password']));
	    return null;
	}

	public static function getAllFlux() : array {
		return (new FluxGateway())->getAllFlux();
	}

	public static function getFlux(string $link) : ?Flux  {
		return (new FluxGateway())->getFlux($link);
	}

	public static function addFlux(string $name, string $link) {
		$name=Cleaner::cleanString($name);
		$link=Cleaner::cleanString($link);
		return (new FluxGateway())->insert($name,$link);
	}

	public static function updateFlux(string $id, string $name, string $link) {
		$id=Cleaner::cleanString($id);
		$name=Cleaner::cleanString($name);
		$link=Cleaner::cleanString($link);
		return (new FluxGateway())->update($id,$name,$link);
	}

	public static function deleteFlux(string $id) {
		$id=Cleaner::cleanString($id);
		return (new FluxGateway())->delete($id);
	}
}
