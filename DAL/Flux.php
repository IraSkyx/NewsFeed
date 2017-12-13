<?php

class Flux {

    private $id;
    private $name;
    private $link;

    /**
     * Flux constructor.
     * @param $id
     * @param $name
     * @param $link
     */
    public function __construct($id, $name, $link) {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
    }

    function getId() : ?int {
        return $this->id;
    }

    function getName() : ?string {
        return $this->name;
    }

    function getLink() : ?string {
        return $this->link;
    }
}
