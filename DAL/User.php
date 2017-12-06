<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 14:14
 */

class User {
    private $username;
    private $password;

    /**
     * User constructor.
     * @param $username
     * @param $password
     */
    function __construct($username,$password)
    {
        $this->username=$username;
        $this->password=$password;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }
}
