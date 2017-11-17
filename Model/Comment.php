<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 20:45
 */

class Comment {
    private $comment_id;
    private $news_id;
    private $username;
    private $title;
    private $comment;

    /**
     * Comment constructor.
     * @param $username
     * @param $news_id
     * @param $comment
     */
    function __construct($username,$news_id,$title,$comment){
        $this->username=$username;
        $this->news_id=$news_id;
        $this->title=$title;
        $this->comment=$comment;
    }
}
