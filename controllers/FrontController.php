<?php

error_reporting(E_ALL & ~E_NOTICE);

class FrontController {

  function __construct(){
  	session_start();

  	$adminActions=array();
  	$usersActions=array();

    $action = Cleaner::CleanString($_REQUEST['action']);
    $admin = AdminModel::isAdmin();

    var_dump($admin);

    if($admin == null)
        new UserController($action);
    else
        new AdminController($action);
  }
}
