<?php

class AdminGateway {
    private $con;

    public function __construct() {
        $this->con = new Connection();
    }

    public function getAdmin($username, $password) : ?Admin {
        try {
          $query='SELECT * FROM admins WHERE username=:username AND password=:password';

          $this->con->executeQuery($query, array(
              ':username'=>array($username, PDO::PARAM_STR),
              ':password'=>array($password, PDO::PARAM_STR)
          ));

          $res = $this->con->getFirst();
          return !$res ? null : AdminFactory::make($res);
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function insert($username, $password) : string {
      try {
        $query='INSERT INTO admins (username, password) VALUES(:username, :password)';

        $this->con->executeQuery($query, array(
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
      }
      catch(PDOException $e) {
        throw new Exception($e, $this->con->getErrorCode());
      }
    }

    public function update($id, $username, $password) : bool {
      try {
        $query= 'UPDATE admins SET username=:username, password=:password WHERE id=:id';

        return $this->con->executeQuery($query, array(
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR),
            ':id' => array($id, PDO::PARAM_INT)
        ));
      }
      catch(PDOException $e) {
        throw new Exception($e, $this->con->getErrorCode());
      }
    }

    public function delete($id) : bool {
      try {
        $query= 'DELETE FROM admins WHERE id=:id';

        return $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
      }
      catch(PDOException $e) {
        throw new Exception($e, $this->con->getErrorCode());
      }
    }
}
