<?php

/**
 * Created by PhpStorm.
 * user: adlenoir
 * Date: 17/11/2017
 * Time: 14:19
 */

class UserGateway {
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function GetUser($username, $password){

        $query='SELECT * FROM Users WHERE Username=:Username AND Password=:Password';

        $this->con->executeQuery($query, array(
            ':Username'=>array($username, PDO::PARAM_STR),
            ':Password'=>array($password, PDO::PARAM_STR)
        ));

        return $this->con->getFirst();
    }

    public function Insert($username, $password){

      $query='INSERT INTO Users VALUES(:Username, :Password)';

      $this->con->executeQuery($query, array(
          ':Username' => array($username, PDO::PARAM_STR),
          ':Password' => array($password, PDO::PARAM_STR)
      ));

      return $this->con->lastInsertId();
    }

    public function Update($username, $password){

      $query= 'UPDATE Users SET Username=:Username, Password=:Password';

      return $this->con->executeQuery($query, array(
          ':Username' => array($username, PDO::PARAM_STR),
          ':Password' => array($password, PDO::PARAM_STR)
      ));
    }

    public function Delete($username){

      $query= 'DELETE FROM Users WHERE Username=:Username';

      return $this->con->executeQuery($query, array(
          ':Username' => array($username, PDO::PARAM_STR)
      ));
    }
}
