<?php

error_reporting(E_ALL & ~E_NOTICE);

class FrontController {

  function __construct(){

    $action = Cleaner::cleanString($_REQUEST['action']);
    $admin = AdminModel::isAdmin();
    if(!$admin)
        new UserController($action);
    else
        new AdminController($action);
  }
}
