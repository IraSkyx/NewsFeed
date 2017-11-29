<?php

class Model {

  public static function getAllNews($page) : array {
    return (new NewsGateway(new Connection()))->GetAllNews(Cleaner::CleanInt($page));
  }
}
