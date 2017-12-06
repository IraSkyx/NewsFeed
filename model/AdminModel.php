<?php

class AdminModel {

  static function isAdmin() {
      session_start();
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        $username=Cleaner::cleanString($_SESSION['username']);
        $password=Cleaner::cleanString($_SESSION['password']);
        return (new UserGateway())->GetUser($username,$password);
      }
      return false;
  }

}
