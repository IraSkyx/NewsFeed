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

    //Setter

    public function setTitle(string $title) : void {
      $this->title=$title;
    }

    public function setDescription(string $description) : void {
      $this->description=$description;
    }

    public function setLink(string $link) : void {
      $this->link=$link;
    }

    public function setGuid(string $guid) : void {
      $this->guid=$guid;
    }

    public function setPubDate(string $pubDate) : void {
      $this->pubDate=$pubDate;
    }

    public function setCategory(string $category) : void {
      $this->category=$category;
    }

    //Getter

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
