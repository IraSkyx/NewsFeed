<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 14:04
 */

class CommentGateway
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function GetAll($news_id){
        $query="SELECT * FROM Comments WHERE $news_id=:News_id";

        $this->con->executeQuery($query,':News_id' => array($news_id, PDO::PARAM_INT) );

        return $this->con->GetResults();
    }

    public function Insert($username,$news_id,$title,$comment){

        $query="INSERT INTO Comments (Username, News_id, Title, Comment) VALUES (:Username,:News_id,:Title,:Comment)";

        $this->con->executeQuery($query, array(
            ':Username' => array($username, PDO::PARAM_STR),
            ':News_id' => array($news_id, PDO::PARAM_INT),
            ':Title' => array($title, PDO::PARAM_STR),
            ':Comment' => array($comment, PDO::PARAM_STR)
        ));

        return $this->con->lastInsertId();
    }

    public function Update($username,$news_id,$title,$comment){
        $query="UPDATE Comments SET Username=:Username,News_id=:News_id,Title=:Title,Comment=:Comment)";

        return $this->con->executeQuery($query, array(
            ':Username' => array($username, PDO::PARAM_STR),
            ':News_id' => array($news_id, PDO::PARAM_INT),
            ':Title' => array($title, PDO::PARAM_STR),
            ':Comment' => array($comment, PDO::PARAM_STR)
        ));
    }

    public function Delete($comment_id){
        $query="DELETE FROM Comments WHERE Comment_id=:Comment_id";

        return $this->con->executeQuery($query, array(
            ':Comment_id' => array($comment_id, PDO::PARAM_INT)
        ));
    }
}
