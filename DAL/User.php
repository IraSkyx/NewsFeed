<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 17/11/2017
 * Time: 14:14
 */

class User {
    private $login;
    private $password;
    private $statut;

    /**
     * User constructor.
     * @param $login
     * @param $password
     * @param $statut
     */
    function __construct($login,$password,$statut)
    {
        $this->login=$login;
        $this->password=$password;
        $this->statut=$statut;
    }
}
