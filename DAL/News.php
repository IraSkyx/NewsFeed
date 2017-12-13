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

    public function getTitle() : ?string {
      return $this->title;
    }

    public function getDescription() : ?string {
      return $this->description;
    }

    public function getLink() : ?string {
      return $this->link;
    }

    public function getGuid() : ?string {
      return $this->guid;
    }

    public function getPubDate() : ?string {
      return $this->pubDate;
    }

    public function getCategory() : ?string {
      return $this->category;
    }
}
