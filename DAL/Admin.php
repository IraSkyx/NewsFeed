<?php

class Admin {

    private $id;
    private $username;
    private $password;

    /**
     * Admin constructor.
     * @param $id
     * @param $username
     * @param $password
     */
    function __construct($id,$username,$password)
    {
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
    }

    function getId() : ?int {
        return $this->id;
    }

    function getUsername() : ?string {
        return $this->username;
    }

    function getPassword() : ?string {
        return $this->password;
    }
}
