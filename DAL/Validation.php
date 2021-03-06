<?php

class Validation{

    public static function areSet($args=array('')) : bool {
        $res=true;
        foreach($args as $line)
            $res&=isset($line);
        return $res;
    }

    public static function areNotEmpty($args=array('')) : bool {
        $res=true;
        foreach($args as $line)
            $res&=!empty($line);
        return $res;
    }

    public static function validateRSS($input) : void {
      try {
        new SimpleXmlElement(@file_get_contents($input));
      }
      catch(Exception $e) {
        throw new Exception($e);
      }
    }

    public static function isNumber($input) : bool {
        if(filter_var($input, FILTER_VALIDATE_INT))
            return true;
      return false;
        //throw new Exception('La valeur "' . $input . ' n\'est pas un nombre entier');
    }

    public static function isFloat($input) : bool {
        if(filter_var($input, FILTER_VALIDATE_FLOAT))
            return true;
        return false;
        //throw new Exception('La valeur "' . $input . ' n\'est pas un nombre à virgule flottante');
    }

    public static function isEmail($input) : bool {
         if(filter_var($input, FILTER_VALIDATE_EMAIL))
             return true;
        return false;
        //throw new Exception('La valeur "' . $input . ' n\'est pas un email');
    }

    public static function isText($input) : bool {
        $regex = '/^[a-z][a-z ]*$/i';
        if (filter_var($input, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp"=>$regex)
        )))
            return true;
        return false;
        //throw new Exception('La valeur "' . $input . ' n\'est pas composée que de lettres');
    }

    public static function isAlphanumeric($input) : bool {
        $regex = '/^[a-z_\-0-9 ,]*$/i';
        if(filter_var($input, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp"=>$regex)
        )))
            return true;
        return false;
        //throw new Exception('La valeur "' . $input . ' n\'est pas composée que de chiffres et de lettres');
    }
}
