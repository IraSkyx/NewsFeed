<?php

class Cleaner{

  public static function CleanString($input){
      return filter_var($input, FILTER_SANITIZE_STRING);
  }
}
