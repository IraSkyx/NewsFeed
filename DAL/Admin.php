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

    function getUsername() : ?string {
        return $this->username;
    }

    function getPassword() : ?string {
        return $this->password;
    }
}
