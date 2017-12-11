<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 14:14
 */

class Admin {
    private $username;
    private $password;

    /**
     * Admin constructor.
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
