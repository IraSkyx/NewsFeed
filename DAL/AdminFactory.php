<?php

class AdminFactory {

  public static function make(array $elements) : ?Admin {
    if(isset($elements))
      return new Admin($elements['id'], $elements['username'], $elements['password']);
    return null;
  }

  public static function makeAll(array $elements) : ?array {
    $adminArray = array();
    foreach ($elements as $value)
      $adminArray [] = new Admin($value['id'], $value['username'], $value['password']);
    return $adminArray;
  }
}
