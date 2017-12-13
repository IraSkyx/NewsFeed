<?php

class News {

    private $title;
    private $description;
    private $link;
    private $guid;
    private $pubDate;
    private $category;

    /**
     * News constructor.
     * @param $title
     * @param $description
     * @param $link
     * @param $guid
     * @param $pubDate
     * @param $category
     */
    public function __construct($title, $description, $link, $guid, $pubDate, $category) {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->guid = $guid;
        $this->pubDate = $pubDate;
        $this->category = $category;
    }
}
