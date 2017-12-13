<?php

class NewsFactory {

  public static function make(array $elements) : ?News {
    if(isset($elements))
      return new News($elements['name'], $elements['link']);
    return null;
  }

  public static function makeAll(array $elements) : array {
    $newsArray = array();
    foreach ($elements as $value)
      $newsArray [] = new News($value['title'], $value['description'], $value['link'], $value['guid'], $value['pubdate'], $value['category']);
    return $newsArray;
  }
}
