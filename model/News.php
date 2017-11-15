<?php

/**
 * Created by PhpStorm.
 * User: adlenoir
 * Date: 15/11/17
 * Time: 14:06
 */
class News
{
    private $Title;
    private $Description;
    private $Link;
    private $Guid;
    private $PubDate;
    private $Category;

    /**
     * News constructor.
     * @param $Title
     * @param $Description
     * @param $Link
     * @param $Guid
     * @param $PubDate
     * @param $Category
     */
    public function __construct($Title, $Description, $Link, $Guid, $PubDate, $Category)
    {
        $this->Title = $Title;
        $this->Description = $Description;
        $this->Link = $Link;
        $this->Guid = $Guid;
        $this->PubDate = $PubDate;
        $this->Category = $Category;
    }


}