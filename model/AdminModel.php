<?php

class AdminModel {

	static function connect($username, $password){
		$username=Cleaner::CleanString($username);
		$password=Cleaner::CleanString($password);

		$admin=(new UserGateway())->GetUser($username, hash("sha512", $password));

		if($admin == null)
			return null;

		session_start();

		$_SESSION['username']=$admin->getUsername();
		$_SESSION['password']=$admin->getPassword();
		$_SESSION['sessionID']=password_hash(session_id(), PASSWORD_DEFAULT);

		return $admin;
	}

	static function disconnect() {
		session_unset();
		session_destroy();
		$_SESSION=array();
	}

	static function isAdmin() : ?User {
			session_start();
	    if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['sessionID'])){
	       //if(password_verify(session_id(),$_SESSION['sessionID']))
	       		return new User(Cleaner::CleanString($_SESSION['username']), Cleaner::CleanString($_SESSION['password']));
	    }
	    return null;
	}

}
