<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 15/11/17
 * Time: 14:45
 */

class NewsGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function GetAllNews(int $page){
        $query="SELECT * FROM News LIMIT :Page, 10";

        $this->con->executeQuery($query, array(
            ':Page' => array($page-1, PDO::PARAM_INT)
        ));

        return $this->con->GetResults();
    }

    public function Insert($title, $description, $link, $guid, $pubDate, $category){

        $query="INSERT INTO News VALUES (:Title,:Description,:Link,:Guid, :PubDate, :Category)";

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

    public function Update($title, $description, $link, $guid, $pubDate, $category){
        $query="UPDATE News SET Title=:Title,Description=:Description,Link=:Link,Guid=:Guid, PubDate=:PubDate,Category=:Category)";

        return $this->con->executeQuery($query, array(
            ':Title' => array($title, PDO::PARAM_STR),
            ':Description' => array($description, PDO::PARAM_STR),
            ':Link' => array($link, PDO::PARAM_STR),
            ':Guid' => array($guid, PDO::PARAM_STR),
            ':PubDate' => array(date("Y-m-d H:i:s", strtotime($pubDate)), PDO::PARAM_STR),
            ':Category' => array($category, PDO::PARAM_STR)
        ));
    }

    public function Delete($title){
        $query="DELETE FROM News WHERE Title=:Title";

        return $this->con->executeQuery($query, array(
            ':Title' => array($title, PDO::PARAM_STR)
        ));
    }
}
