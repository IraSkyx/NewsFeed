<?php

class Parser {

    private $path;
    private $result;
    private $depth;

    /**
     * Parser constructor.
     * @param $path
     */
    public function __construct($path) {
        $this -> path = $path;
        $this -> depth = 0;
    }

    public function getResult() {
        return $this->result;
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

        $this -> result = ob_get_contents();
        ob_end_clean();
        fclose($fp);
        xml_parser_free($xml_parser);
    }

    private function startElement($parser, $name) {
        global $category,$guid,$item,$title,$link,$description,$pubDate,$news;
        $name=strtolower($name);

        if($name == 'item'){
            $item = true;
            $news = NewsFactory::makeEmpty();
        }

        if($item){
            if($name== 'title')
              $title = true;

            if($name== 'link')
              $link= true;

            if($name== 'description')
              $description = true;

            if($name== 'pubDate')
              $pubDate = true;

            if($name== 'guid')
              $guid = true;

            if($name== 'category')
              $category = true;
        }
    }

    private function displayAttribute($attribute, $text) {
        for ($i = 0; $i < $this -> depth; $i++) {
            echo "ok";
        }

        echo "A - $attribute = $text\n";
    }

    private function endElement($parser, $name) {
        global $category,$guid,$item,$title,$link,$description,$pubDate,$news;

        $name=strtolower($name);

        if($name == 'item'){
            $item = false;
            (new NewsGateway())->Insert($news->getTitle(), $news->getDescription(), $news->getLink(), $news->getGuid(), $news->getPubDate(), $news->getCategory());
        }
        $this -> depth--;
    }

    private function characterData($parser, $data) {
        global $category,$guid,$item,$title,$link,$description,$pubDate,$news;

        echo $category?"true":"false"."</br>".(bool)$guid?"true":"false"."</br>".(bool)$item?"true":"false"."</br>".(bool)$title?"true":"false"."</br>".(bool)$link?"true":"false"."</br>".(bool)$description?"true":"false"."</br>".(bool)$pubDate."</br></br>";

        $data = trim($data);

        if ($title == true){
          $news->setTitle($data);
          $title=false;
        }
        if ($link == true){
          $news->setLink($data);
          $link=false;
        }
        if ($description == true){
          //echo "La description : ".$data."</br>";
          $news->setDescription($data);
          $description=false;
        }
        if ($pubDate == true){
          $news->setPubDate($data);
          $pubDate=false;
        }
        if ($guid == true){
          $news->setGuid($data);
          $guid=false;
        }
        if ($category == true){
          $news->setCategory($data);
          $category=false;
        }
    }
}
