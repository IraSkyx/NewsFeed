<?php

class Flux {

    private $name;
    private $link;

    /**
     * Flux constructor.
     * @param $name
     * @param $link
     */
    public function __construct($name, $link) {
        $this->name = $name;
        $this->link = $link;
    }
}
