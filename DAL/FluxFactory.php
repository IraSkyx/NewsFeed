<?php

class FluxFactory {

  public static function make(array $elements) : ?Flux {
    if(isset($elements))
      return new Flux($elements['id'], $elements['name'], $elements['link']);
    return null;
  }

  public static function makeAll(array $elements) : ?array {
    $fluxArray = array();
    foreach ($elements as $value)
      $fluxArray [] = new Flux($value['id'], $value['name'], $value['link']);
    return $fluxArray;
  }
}
