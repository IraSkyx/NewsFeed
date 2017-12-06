<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 14:19
 */

class UserGateway {
    private $con;

    public function __construct(){
        $this->con = new Connection();
    }

    public function GetUser($username, $password){
        $query='SELECT * FROM users WHERE username=:username AND password=:password';

        $this->con->executeQuery($query, array(
            ':username'=>array($username, PDO::PARAM_STR),
            ':password'=>array($password, PDO::PARAM_STR)
        ));

        $admin = $this->con->getFirst();
        return $admin == false ? null : new User($admin['username'],$admin['password']);
    }

    public function Insert($username, $password){

      $query='INSERT INTO users VALUES(:username, :password)';

      $this->con->executeQuery($query, array(
          ':username' => array($username, PDO::PARAM_STR),
          ':password' => array($password, PDO::PARAM_STR)
      ));

      return $this->con->lastInsertId();
    }

    public function Update($username, $password){

      $query= 'UPDATE users SET username=:username, password=:password';

      return $this->con->executeQuery($query, array(
          ':username' => array($username, PDO::PARAM_STR),
          ':password' => array($password, PDO::PARAM_STR)
      ));
    }

    public function Delete($username){

      $query= 'DELETE FROM users WHERE username=:username';

      return $this->con->executeQuery($query, array(
          ':username' => array($username, PDO::PARAM_STR)
      ));
    }
}
