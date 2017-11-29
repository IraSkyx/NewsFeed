<?php

class Validation{

    public static function AreSet($args=array('')){
        $res=true;
        foreach($args as $line)
            $res&=isset($line);
        return $res;
    }

    public static function AreNotEmpty($args=array('')){
        $res=true;
        foreach($args as $line)
            $res&=!empty($line);
        return $res;
    }

    public static function isNumber($input){
        if(filter_var($input, FILTER_VALIDATE_INT))
            return true;
        throw new Exception('La valeur "' . $input . ' n\'est pas un nombre entier');
    }

    public static function isFloat($input){
        if(filter_var($input, FILTER_VALIDATE_FLOAT))
            return true;
        throw new Exception('La valeur "' . $input . ' n\'est pas un nombre à virgule flottante');
    }

    public static function isEmail($input){
         if(filter_var($input, FILTER_VALIDATE_EMAIL))
             return true;
        throw new Exception('La valeur "' . $input . ' n\'est pas un email');
    }

    public static function isText($input){
        $regex = '/^[a-z][a-z ]*$/i';
        if (filter_var($input, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp"=>$regex)
        )))
            return true;
        throw new Exception('La valeur "' . $input . ' n\'est pas composée que de lettres');
    }

    public static function isAlphanumeric($input){
        $regex = '/^[a-z_\-0-9 ,]*$/i';
        if(filter_var($input, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp"=>$regex)
        )))
            return true;
        throw new Exception('La valeur "' . $input . ' n\'est pas composée que de chiffres et de lettres');
    }
}
