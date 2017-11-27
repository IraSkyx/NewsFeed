<?php

class Cleaner{

  public static function CleanString($input){
      return filter_var($input, FILTER_SANITIZE_STRING);
  }

  public static function CleanInt($input){
      return ValidationManager::isNumber($input) ? filter_var($input, FILTER_SANITIZE_INT) : 1;
  }
}
