<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 14:19
 */

class AdminGateway {
    private $con;

    public function __construct(){
        $this->con = new Connection();
    }

    public function GetAdmin($username, $password) : ?Admin {
        try{
          $query='SELECT * FROM admins WHERE username=:username AND password=:password';

          $this->con->executeQuery($query, array(
              ':username'=>array($username, PDO::PARAM_STR),
              ':password'=>array($password, PDO::PARAM_STR)
          ));

          $admin = $this->con->getFirst();
          return !$admin ? null : new Admin($admin['username'],$admin['password']);
        }
        catch(PDOException $e){
          throw new Exception($e::getMessage());
        }
    }

    public function Insert($username, $password) : string {

      $query='INSERT INTO admins VALUES(:username, :password)';

      $this->con->executeQuery($query, array(
          ':username' => array($username, PDO::PARAM_STR),
          ':password' => array($password, PDO::PARAM_STR)
      ));

      return $this->con->lastInsertId();
    }

    public function Update($username, $password) : bool {

      $query= 'UPDATE admins SET username=:username, password=:password';

      return $this->con->executeQuery($query, array(
          ':username' => array($username, PDO::PARAM_STR),
          ':password' => array($password, PDO::PARAM_STR)
      ));
    }

    public function Delete($username) : bool {

      $query= 'DELETE FROM admins WHERE username=:username';

      return $this->con->executeQuery($query, array(
          ':username' => array($username, PDO::PARAM_STR)
      ));
    }
}
