<?php

class CookieModel {

    public static function setCount(int $count) : void {
        if(Cleaner::cleanInt($count))
          setcookie("count",$count,time()+365*24*3600);
    }

    public static function incrementCount() : void {
        setcookie("count",self::getCount()+1,time()+365*24*3600);
    }

    public static function getCount() : ?int {
        if(!isset($_COOKIE['count']) || !Validation::isNumber($_COOKIE['count']))
          setcookie("count",0,time()+365*24*3600);
        return $_COOKIE['count'];
    }
}
