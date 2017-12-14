<html>
  <body>
    <?php

    require_once(__DIR__.'/../config/config.php');

    require_once(__DIR__.'/../config/Autoload.php');

    Autoload::load();

    $category=false;
    $guid=false;
    $item=false;
    $title=false;
    $link=false;
    $description=false;
    $pubDate=false;
    $news = NewsFactory::makeEmpty();

    $parser = new Parser('https://www.engadget.com/rss.xml');
    $parser ->parse();
    $result = $parser ->getResult();
    echo $result;

    ?>
  </body>
</html>
