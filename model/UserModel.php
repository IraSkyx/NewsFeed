<?php

class UserModel {

  public static function getAllNews($page) : array {
    return (new NewsGateway())->GetAllNews($page);
  }

  public static function getNbNews() : int {
    return (new NewsGateway())->getNbNews();
  }

  public static function getNewsByKeyWord(string $keyword, int $page) : array {
    return (new NewsGateway())->GetNewsByKeyWord($keyword, $page);
  }

  public static function getNbNewsByKeyword(string $keyWord) : int {
    return (new NewsGateway())->getNbNewsByKeyword($keyWord);
  }
}
