<?php

class UserModel {

  public static function getAllNews($page) : array {
    return (new NewsGateway())->GetAllNews($page);
  }

  public static function getNbNews() : int {
    return (new NewsGateway())->getNbNews();
  }

  public static function getNewsByKeyWord(string $keyword) : array {
    return (new NewsGateway())->GetNewsByKeyWord($keyword);
  }
}
