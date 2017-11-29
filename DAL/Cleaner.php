<?php

class Cleaner {

  public static function CleanString($input) : string {
      return filter_var($input, FILTER_SANITIZE_STRING);
  }

  public static function CleanInt($input) : int {
      return Validation::isNumber($input) ? filter_var($input, FILTER_SANITIZE_NUMBER_INT) : 1;
  }
}
