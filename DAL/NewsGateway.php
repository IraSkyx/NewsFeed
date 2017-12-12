<?php

class NewsGateway {
    private $con;

    public function __construct() {
        $this->con = new Connection();
    }

    public function GetAllNews(int $page) {
        $nbNewsPerpage=1;
        try {
          $query="SELECT * FROM news LIMIT :Page,:NbNews";

          $this->con->executeQuery($query, array(
              ':Page' => array(($page-1)*$nbNewsPerpage, PDO::PARAM_INT),
              ':NbNews' => array($nbNewsPerpage, PDO::PARAM_INT)
          ));

          return $this->con->getResults();
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function GetNewsByKeyWord(string $keyword, int $page) {
        $nbNewsPerpage=1;
        try {
          $query="SELECT * FROM news WHERE Title REGEXP :Regex OR Description REGEXP :Regex LIMIT :Page,:NbNews";

          $this->con->executeQuery($query, array(
              ':Regex' => array($keyword, PDO::PARAM_STR),
              ':Page' => array(($page-1)*$nbNewsPerpage, PDO::PARAM_INT),
              ':NbNews' => array($nbNewsPerpage, PDO::PARAM_INT)
          ));

          return $this->con->getResults();
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function getNbNews() {
        try {
          $query="SELECT COUNT(*) FROM news";

          $this->con->executeQuery($query);

          return ($this->con->getFirst())['COUNT(*)'];
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function getNbNewsByKeyword(string $keyword) {
        try {
          $query="SELECT COUNT(*) FROM news WHERE Title REGEXP :Regex OR Description REGEXP :Regex";

          $this->con->executeQuery($query, array(
              ':Regex' => array($keyword, PDO::PARAM_STR)
          ));

          return ($this->con->getFirst())['COUNT(*)'];
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function Insert($title, $description, $link, $guid, $pubDate, $category) {
      try{
        $query="INSERT INTO news VALUES (:Title,:Description,:Link,:Guid, :PubDate, :Category)";

        $this->con->executeQuery($query, array(
            ':Title' => array($title, PDO::PARAM_STR),
            ':Description' => array($description, PDO::PARAM_STR),
            ':Link' => array($link, PDO::PARAM_STR),
            ':Guid' => array($guid, PDO::PARAM_STR),
            ':PubDate' => array(date("Y-m-d H:i:s", strtotime($pubDate)), PDO::PARAM_STR),
            ':Category' => array($category, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
      }
      catch(PDOException $e) {
        throw new Exception($e);
      }
    }

    public function Update($title, $description, $link, $guid, $pubDate, $category) {
        try {
          $query="UPDATE news SET Title=:Title,Description=:Description,Link=:Link,Guid=:Guid, PubDate=:PubDate,Category=:Category)";

          return $this->con->executeQuery($query, array(
              ':Title' => array($title, PDO::PARAM_STR),
              ':Description' => array($description, PDO::PARAM_STR),
              ':Link' => array($link, PDO::PARAM_STR),
              ':Guid' => array($guid, PDO::PARAM_STR),
              ':PubDate' => array(date("Y-m-d H:i:s", strtotime($pubDate)), PDO::PARAM_STR),
              ':Category' => array($category, PDO::PARAM_STR)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function Delete($title) {
        try {
          $query="DELETE FROM news WHERE Title=:Title";

          return $this->con->executeQuery($query, array(
              ':Title' => array($title, PDO::PARAM_STR)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }
}
