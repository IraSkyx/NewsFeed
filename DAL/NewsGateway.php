<?php

class NewsGateway {
    private $con;

    public function __construct() {
        $this->con = new Connection();
    }

    public function getAllNews(int $page) : ?array {
        $nbNewsPerpage=10;
        try {
          $query="SELECT * FROM news ORDER BY pubdate DESC LIMIT :page,:nbNews";

          $this->con->executeQuery($query, array(
              ':page' => array(($page-1)*$nbNewsPerpage, PDO::PARAM_INT),
              ':nbNews' => array($nbNewsPerpage, PDO::PARAM_INT)
          ));

          $res = $this->con->getResults();
          return !$res ? NULL : NewsFactory::makeAll($res);
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function getNewsByKeyWord(string $keyword, int $page) : ?array {
        $nbNewsPerpage=10;
        try {
          $query="SELECT * FROM news WHERE title REGEXP :regex OR description REGEXP :regex ORDER BY pubdate DESC LIMIT :page,:nbNews";

          $this->con->executeQuery($query, array(
              ':regex' => array($keyword, PDO::PARAM_STR),
              ':page' => array(($page-1)*$nbNewsPerpage, PDO::PARAM_INT),
              ':nbNews' => array($nbNewsPerpage, PDO::PARAM_INT)
          ));

          return NewsFactory::makeAll($this->con->getResults());
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function getNbNews() : ?int {
        try {
          $query="SELECT COUNT(*) FROM news";

          $this->con->executeQuery($query);

          return ($this->con->getFirst())['COUNT(*)'];
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function getNbNewsByKeyword(string $keyword) : ?int {
        try {
          $query="SELECT COUNT(*) FROM news WHERE title REGEXP :regex OR description REGEXP :regex";

          $this->con->executeQuery($query, array(
              ':regex' => array($keyword, PDO::PARAM_STR)
          ));

          return ($this->con->getFirst())['COUNT(*)'];
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function insert($title, $description, $link, $guid, $pubDate, $category) : ?string {
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
        throw new Exception($e, $this->con->getErrorCode());
      }
    }

    public function update($title, $description, $link, $guid, $pubDate, $category) : bool {
        try {
          $query="UPDATE news SET title=:title, description=:description, link=:link, pubdate=:pubdate, category=:category WHERE guid=:guid";

          return $this->con->executeQuery($query, array(
              ':title' => array($title, PDO::PARAM_STR),
              ':description' => array($description, PDO::PARAM_STR),
              ':link' => array($link, PDO::PARAM_STR),
              ':pubdate' => array(date("Y-m-d H:i:s", strtotime($pubDate)), PDO::PARAM_STR),
              ':category' => array($category, PDO::PARAM_STR),
              ':guid' => array($guid, PDO::PARAM_STR)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }

    public function delete($guid) : bool {
        try {
          $query="DELETE FROM news WHERE guid=:guid";

          return $this->con->executeQuery($query, array(
              ':guid' => array($guid, PDO::PARAM_INT)
          ));
        }
        catch(PDOException $e) {
          throw new Exception($e, $this->con->getErrorCode());
        }
    }
}
