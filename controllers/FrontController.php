<?php

error_reporting(E_ALL & ~E_NOTICE);

class FrontController {

  private $usersActions=array(NULL,'login','search','signin');
  private $adminActions=array(NULL,'logout','search','viewFlux','addFlux','updateFlux','deleteFlux');

  function __construct() {
    global $rep,$views,$contents,$admin,$count;

    try {
      $action = Cleaner::cleanString($_REQUEST['action']);

      if(in_array($action, $this->adminActions)) {
          $admin = AdminModel::isAdmin();

          if(!isset($admin)){
            if(in_array($action, $this->usersActions))
              new UserController($action); //I'm not admin but i want to get an action which can be requested by both user and admin (e.g NULL)
            else
              new UserController('login'); //I'm not an admin but i want to do something admin can do so I should login before (e.g addFlux)
          }
          else {
            $count=CookieModel::getCount(); //I'm an admin
            new AdminController($action); //So I can get my requested action
          }
      }
      else
        new UserController($action); //Bad request or user only actions (e.g login)
    }
    catch(Exception $e) {
      $errors[] =	"Error : " . $e;
			require($rep.$views['error']);
    }
  }
}
