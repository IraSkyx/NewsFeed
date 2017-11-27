<?php

class Model {

  public function getAllNews(int $page) : array{
    $page = Cleaner::CleanInt($page);
    $gateway = new NewsGateway(new Connection());
    return $gateway->getAllNews($page);
  }

}
