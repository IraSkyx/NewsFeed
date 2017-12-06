<?php

error_reporting(E_ALL & ~E_NOTICE);

class FrontController {

  function __construct(){

  	$adminActions=array('addFlux', 'logout');
  	$usersActions=array('login');

    $action = Cleaner::CleanString($_REQUEST['action']);
    $GLOBALS['admin'] = AdminModel::isAdmin();

    if($GLOBALS['admin'] == null)
        new UserController($action);
    else
        new AdminController($action);
  }
}
