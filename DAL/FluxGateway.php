<?php

class FluxGateway {
    private $con;

    public function __construct() {
        $this->con = new Connection();
    }

    public function GetAllFlux() {
        try {
          $query="SELECT * FROM flux";

          $this->con->executeQuery($query);

          return $this->con->getResults();
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function Insert($name, $link) {
      try {
        $query="INSERT INTO flux VALUES (:Name,:Link)";

        $this->con->executeQuery($query, array(
            ':Name' => array($name, PDO::PARAM_STR),
            ':Link' => array($link, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
      }
      catch(PDOException $e) {
        throw new Exception($e);
      }
    }

    public function Update($name, $link) {
        try {
          $query="UPDATE flux SET name=:Name WHERE link=:Link";

          return $this->con->executeQuery($query, array(
              ':Name' => array($name, PDO::PARAM_STR),
              ':Link' => array($link, PDO::PARAM_STR)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function Delete($link) {
        try {
          $query="DELETE FROM flux WHERE link=:Link";

          return $this->con->executeQuery($query, array(
              ':Link' => array($link, PDO::PARAM_STR)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }
}
