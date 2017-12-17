<?php

class Parser {

    private $path;
    private $category;
    private $guid;
    private $item;
    private $title;
    private $link;
    private $description;
    private $pubDate;
    private $news;
    private $tabNews;

    public function setPath(string $path){
      $this->path=$path;
      $this->category=false;
      $this->guid=false;
      $this->item=false;
      $this->title=false;
      $this->link=false;
      $this->description=false;
      $this->pubDate=false;
      $this->news=NewsFactory::makeEmpty();
      $this->tabNews=array();
    }

    public function getTabNews(){
      return $this->tabNews;
    }

    public function parse() {
        ob_start();
        $xml_parser = xml_parser_create();
        xml_set_object($xml_parser, $this);
        xml_set_element_handler($xml_parser, "startElement", "endElement");
        xml_set_character_data_handler($xml_parser, 'characterData');
        if (!($fp = fopen($this -> path, "r"))) {
            die("could not open XML input");
        }

        while ($data = fread($fp, 4096)) {
            if (!xml_parse($xml_parser, $data, feof($fp))) {
                die(sprintf("XML error: %s at line %d",
                    xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
            }
        }

        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }

    private function startElement($parser, $name) {
        $name=strtolower($name);

        if($name == 'item'){
            $this->item = true;
            $this->news = NewsFactory::makeEmpty();
        }
        elseif($this->item){
          switch($name){
            case 'title' : $this->title = true; break;
            case 'link' : $this->link = true; break;
            case 'description' : $this->description = true; break;
            case 'pubdate' : $this->pubDate = true; break;
            case 'guid' : $this->guid = true; break;
            case 'category' : $this->category = true; break;
          }
        }
    }

    private function endElement($parser, $name) {
      $name=strtolower($name);

        if($name == 'item'){
            $this->item = false;
            $this->tabNews[] = $this->news;
        }
        elseif($this->item){
          switch($name){
            case 'title' : $this->title = false; break;
            case 'link' : $this->link = false; break;
            case 'description' : $this->description = false; break;
            case 'pubdate' : $this->pubDate = false; break;
            case 'guid' : $this->guid = false; break;
            case 'category' : $this->category = false; break;
          }
        }
    }

    private function characterData($parser, $data) {
        $data = strip_tags(trim($data));

        if ($this->title && !empty($data))
          $this->news->setTitle($data);

        if ($this->link && !empty($data))
          $this->news->setLink($data);

        if ($this->description && !empty($data))
          $this->news->setDescription($data);

        if ($this->pubDate && !empty($data))
          $this->news->setPubDate($data);

        if ($this->guid && !empty($data))
          $this->news->setGuid($data);

        if ($this->category && !empty($data))
          $this->news->setCategory(empty($this->news->getCategory()) ? $data : $this->news->getCategory().', '.$data);
    }
}
