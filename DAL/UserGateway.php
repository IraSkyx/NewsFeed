<?php

/**
 * Created by PhpStorm.
 * user: adlenoir
 * Date: 17/11/2017
 * Time: 14:19
 */

class UserGateway {
    private $con;

    public function __construct(Connexion $con){
      $this->con=$con;
    }

    public function GetUser($username, $password){

        $query='SELECT * FROM Users WHERE Username=:Username AND Password=:Password';

        return $this->con->executeQuery($query, array(
            ':Username'=>array($username, PDO::PARAM_STR),
            ':Password'=>array($password, PDO::PARAM_STR)
        ));
    }

    public function Insert($pseudo, $mdp, $role){

      $query='INSERT INTO Users VALUES(:pseudo, :mdp, :role)';

      $this->con->executeQuery($query, array(
          ':login'=>array($pseudo, PDO::PARAM_STR),
          ':mdp'=>array($mdp, PDO::PARAM_STR),
          ':role'=>array($role, PDO::PARAM_STR)
      ));

      return $this->con->lastInsertId();
    }

    public function Update($username, $password, $statut){

      $query= 'UPDATE Users SET Username=:Username, Password=:Password, Statut=:Statut';

      return $this->con->executeQuery($query, array(
          ':Username' => array($username, PDO::PARAM_STR),
          ':Password' => array($password, PDO::PARAM_STR),
          ':Username' => array($statut, PDO::PARAM_STR)
      ));
    }

    public function Delete($username){

      $query= 'DELETE FROM Users WHERE Username=:Username';

      return $this->con->executeQuery($query, array(
          ':Username' => array($username, PDO::PARAM_STR)
      ));
    }
}
