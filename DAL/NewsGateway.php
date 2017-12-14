<?php

class NewsGateway {
    private $con;

    public function __construct() {
        $this->con = new Connection();
    }

    public function getAllNews(int $page) {
        $nbNewsPerpage=1;
        try {
          $query="SELECT * FROM news LIMIT :page,:nbNews";

          $this->con->executeQuery($query, array(
              ':page' => array(($page-1)*$nbNewsPerpage, PDO::PARAM_INT),
              ':nbNews' => array($nbNewsPerpage, PDO::PARAM_INT)
          ));

          $res = $this->con->getResults();
          return !$res ? NULL : NewsFactory::makeAll($res);
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function getNewsByKeyWord(string $keyword, int $page) {
        $nbNewsPerpage=1;
        try {
          $query="SELECT * FROM news WHERE title REGEXP :regex OR description REGEXP :regex LIMIT :page,:nbNews";

          $this->con->executeQuery($query, array(
              ':regex' => array($keyword, PDO::PARAM_STR),
              ':page' => array(($page-1)*$nbNewsPerpage, PDO::PARAM_INT),
              ':nbNews' => array($nbNewsPerpage, PDO::PARAM_INT)
          ));

          return NewsFactory::makeAll($this->con->getResults());
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
          $query="SELECT COUNT(*) FROM news WHERE title REGEXP :regex OR description REGEXP :regex";

          $this->con->executeQuery($query, array(
              ':regex' => array($keyword, PDO::PARAM_STR)
          ));

          return ($this->con->getFirst())['COUNT(*)'];
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function insert($title, $description, $link, $guid, $pubDate, $category) {
      echo $description.'</br>';
      try {
        $query="INSERT INTO news VALUES (:title,:description,:link,:guid,:pubDate,:category)";

        $this->con->executeQuery($query, array(
            ':title' => array($title, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':link' => array($link, PDO::PARAM_STR),
            ':guid' => array($guid, PDO::PARAM_STR),
            ':pubDate' => array(date("Y-m-d H:i:s", strtotime($pubDate)), PDO::PARAM_STR),
            ':category' => array($category, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
      }
      catch(PDOException $e) {
        throw new Exception($e);
      }
    }

    public function update($title, $description, $link, $guid, $pubDate, $category) {
        try {
          $query="UPDATE news SET title=:title, description=:description, guid=:guid, pubdate=:pubdate, category=:category) WHERE link=:link";

          return $this->con->executeQuery($query, array(
              ':title' => array($title, PDO::PARAM_STR),
              ':description' => array($description, PDO::PARAM_STR),
              ':guid' => array($guid, PDO::PARAM_STR),
              ':pubdate' => array(date("Y-m-d H:i:s", strtotime($pubDate)), PDO::PARAM_STR),
              ':category' => array($category, PDO::PARAM_STR),
              ':link' => array($link, PDO::PARAM_STR)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }

    public function delete($link) {
        try {
          $query="DELETE FROM news WHERE link=:link";

          return $this->con->executeQuery($query, array(
              ':link' => array($link, PDO::PARAM_INT)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e);
        }
    }
}
