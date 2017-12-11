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
			if(isset($_SESSION['username']) && isset($_SESSION['password'])){
					       		$admin= new Admin(Cleaner::CleanString($_SESSION['username']), Cleaner::CleanString($_SESSION['password']));
										echo $admin;
			}
	    return null;
	}
}
