<?php

error_reporting(E_ALL & ~E_NOTICE);

class FrontController {

  private $adminActions=array('addFlux','logout');
  private $usersActions=array(NULL,'login','search','signin');

  function __construct() {
    global $rep,$views,$contents,$admin;

    try{
      $action = Cleaner::CleanString($_REQUEST['action']);

      if(in_array($action, $this->adminActions)){
          $admin = AdminModel::isAdmin();
          var_dump($admin);
          if($admin == NULL)
            new UserController('login');
          else
            new AdminController($action);
      }
      else if(in_array($action,$this->usersActions))
        new UserController($action);

      else
        require($rep.$views['404']);
    }
    catch(Exception $e){
      $errors[] =	"Error : " . $e;
			require($rep.$views['error']);
    }
  }
}
