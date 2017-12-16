<?php

class Parser {

    private $path;

    public function setPath(string $path){
      $this->path=$path;
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
        global $category,$guid,$item,$title,$link,$description,$pubDate,$news,$tabNews;
        $name=strtolower($name);

        if($name == 'item'){
            $item = true;
            $news = NewsFactory::makeEmpty();
        }
        elseif($item){
          switch($name){
            case 'title' : $title = true; break;
            case 'link' : $link = true; break;
            case 'description' : $description = true; break;
            case 'pubdate' : $pubDate = true; break;
            case 'guid' : $guid = true; break;
            case 'category' : $category = true; break;
          }
        }
    }

    private function endElement($parser, $name) {
      global $category,$guid,$item,$title,$link,$description,$pubDate,$news,$tabNews;
      $name=strtolower($name);

        if($name == 'item'){
            $item = false;
            $tabNews[] = $news;
        }
        elseif($item){
          switch($name){
            case 'title' : $title = false; break;
            case 'link' : $link = false; break;
            case 'description' : $description = false; break;
            case 'pubdate' : $pubDate = false; break;
            case 'guid' : $guid = false; break;
            case 'category' : $category = false; break;
          }
        }
    }

    private function characterData($parser, $data) {
        global $category,$guid,$item,$title,$link,$description,$pubDate,$news,$tabNews;

        $data = trim($data);

        if ($title && !empty($data))
          $news->setTitle($data);

        if ($link && !empty($data))
          $news->setLink($data);

        if ($description && !empty($data))
          if(preg_match('/(<img[^>]+>)/i', $data, $matches) == 1)
            $news->setDescription(str_replace($matches[1], "", $data));
          else
            $news->setDescription($data);

        if ($pubDate && !empty($data))
          $news->setPubDate($data);

        if ($guid && !empty($data))
          $news->setGuid($data);

        if ($category && !empty($data))
          $news->setCategory(empty($news->getCategory()) ? $data : $news->getCategory().', '.$data);

    }
}
