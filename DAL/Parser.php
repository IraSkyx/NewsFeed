<?php
/*
 * Created by PhpStorm.
 * User: Gabin
 * Date: 13/12/2017
 * Time: 13:26
 */

class Parser
{
    /**
     * Admin constructor.
     * @param $username
     * @param $password
     */

    private $path;
    private $result;
    private $depth;

    public function __construct($path)
    {
        $this -> path = $path;
        $this -> depth = 0;
    }

    public function getResult() {
        return $this->result;
    }
}