<?php

class UserModel {

  public static function getAllNews($page) : array {
    return (new NewsGateway(new Connection()))->GetAllNews($page);
  }

  public static function getNbNews() : int {
    return (new NewsGateway(new Connection()))->getNbNews();
  }

  public static function getNewsByKeyWord(string $keyword) : array {
    return (new NewsGateway(new Connection()))->GetNewsByKeyWord($keyword);
  }

  public static function login($username, $password) : bool {
     return count((new UserGateway(new Connection()))->GetUser($username, $password)) > 0;
  }
}
