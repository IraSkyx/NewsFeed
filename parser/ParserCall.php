<?php

  require_once(__DIR__.'/../config/config.php');
  require_once(__DIR__.'/../config/Autoload.php');
  Autoload::load();

  $parser=new Parser();
  $gateway=new NewsGateway();

  foreach((new FluxGateway())->getAllFlux() as $flux){
    $parser->setPath($flux->getLink());
    $parser->parse();

    foreach ($parser->getTabNews() as $elmt) {
      try {
        $gateway->insert($elmt->getTitle(),$elmt->getDescription(),$elmt->getLink(),$elmt->getGuid(),$elmt->getPubDate(),$elmt->getCategory());
      }
      catch(Exception $e) {
        if($e->getCode() == DUPLICATION)
          $gateway->update($elmt->getTitle(),$elmt->getDescription(),$elmt->getLink(),$elmt->getGuid(),$elmt->getPubDate(),$elmt->getCategory());
      }
    }
  }
