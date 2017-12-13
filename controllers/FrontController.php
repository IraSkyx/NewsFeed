<?php

error_reporting(E_ALL & ~E_NOTICE);

class FrontController {

  private $usersActions=array(NULL,'login','search','signin');
  private $adminActions=array(NULL,'logout','search','viewFlux','addFlux','updateFlux','deleteFlux');

  function __construct() {
    global $rep,$views,$contents,$admin;

    try {
      $action = Cleaner::cleanString($_REQUEST['action']);

      if(in_array($action, $this->adminActions)) {
          $admin = AdminModel::isAdmin();
          if($admin == NULL && !in_array($action, $this->adminActions))
            new UserController('login');
          else
            new AdminController($action);
      }
      else if(in_array($action,$this->usersActions))
          new UserController($action);

      else
        require($rep.$views['404']);
    }
    catch(Exception $e) {
      $errors[] =	"Error : " . $e;
			require($rep.$views['error']);
    }
  }
}
