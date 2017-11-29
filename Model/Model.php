<?php

class Model {

  public static function getAllNews($page) : array {
    return (new NewsGateway(new Connection()))->GetAllNews($page);
  }

  public static function getNbNews() : int {
    return (new NewsGateway(new Connection()))->getNbNews();
  }

  public static function getNewsByKeyWord(string $keyword) : array{
    return (new NewsGateway(new Connection()))->GetNewsByKeyWord($keyword);
  }
}
