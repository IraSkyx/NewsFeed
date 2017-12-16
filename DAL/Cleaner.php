<?php

class Cleaner {

  public static function cleanString($input) : string {
      return filter_var($input, FILTER_SANITIZE_STRING);
  }

  public static function cleanInt($input) : int {
      if(!Validation::isNumber($input) || $input < 1)
        return 1;
      return $input;
  }
}
