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

    public function GetAll(){
        $query="SELECT * FROM News";

        $this->con->executeQuery($query);

        return $this->con->GetResults();
    }

    public function Insert($Title, $Description, $Link, $Guid, $PubDate, $Category){

        $query="INSERT INTO News VALUES (:Title,:Description,:Link,:Guid, :PubDate, :Category)";

        $this->con->executeQuery($query, array(
            ':Title' => array($Title, PDO::PARAM_STR),
            ':Description' => array($Description, PDO::PARAM_STR),
            ':Link' => array($Link, PDO::PARAM_STR),
            ':Guid' => array($Guid, PDO::PARAM_STR),
            ':PubDate' => array(date("Y-m-d H:i:s", strtotime($PubDate)), PDO::PARAM_STR),
            ':Category' => array($Category, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
    }

    public function Update($Title, $Description, $Link, $Guid, $PubDate, $Category){
        $query="UPDATE News SET Title=:Title,Description=:Description,Link=:Link,Guid=:Guid, PubDate=:PubDate,Category=:Category)";

        return $this->con->executeQuery($query, array(
            ':Title' => array($Title, PDO::PARAM_STR),
            ':Description' => array($Description, PDO::PARAM_STR),
            ':Link' => array($Link, PDO::PARAM_STR),
            ':Guid' => array($Guid, PDO::PARAM_STR),
            ':PubDate' => array(date("Y-m-d H:i:s", strtotime($PubDate)), PDO::PARAM_STR),
            ':Category' => array($Category, PDO::PARAM_STR)
        ));
    }

    public function Delete($Title){
        $query="DELETE FROM News WHERE Title=:Title";

        return $this->con->executeQuery($query, array(
            ':Title' => array($Title, PDO::PARAM_STR)
        ));
    }
}