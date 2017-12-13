<?php

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
