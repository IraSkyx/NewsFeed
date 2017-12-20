<?php

class FluxGateway {
    private $con;

    public function __construct() {
        $this->con = new Connection();
    }

    public function getAllFlux() : ?array {
        try {
          $query="SELECT * FROM flux";

          return !($this->con->executeQuery($query)) ? NULL : FluxFactory::makeAll($this->con->getResults());
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function getFlux(string $link) : ?Flux {
        try {
          $query="SELECT * FROM flux WHERE link=:link";

          $this->con->executeQuery($query, array(
              ':link' => array($link, PDO::PARAM_STR)
          ));

          $res=$this->con->getFirst();

          return !$res ? NULL : FluxFactory::make($res);
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function insert($name, $link) : ?string {
      try {
        $query="INSERT INTO flux (name,link) VALUES (:name,:link)";

        $this->con->executeQuery($query, array(
            ':name' => array($name, PDO::PARAM_STR),
            ':link' => array($link, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
      }
      catch(PDOException $e) {
        throw new Exception($e, $this->con->getErrorCode());
      }
    }

    public function update($id, $name, $link) : bool {
        try {
          $query="UPDATE flux SET name=:name, link=:link WHERE id=:id";

          return $this->con->executeQuery($query, array(
              ':name' => array($name, PDO::PARAM_STR),
              ':link' => array($link, PDO::PARAM_STR),
              ':id' => array($id, PDO::PARAM_INT)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function delete($id) : bool {
        try {
          $query="DELETE FROM flux WHERE id=:id";

          return $this->con->executeQuery($query, array(
              ':id' => array($id, PDO::PARAM_INT)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }
}
