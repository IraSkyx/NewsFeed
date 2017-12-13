/**
 * Created by PhpStorm.
 * User: Gabin
 * Date: 13/12/2017
 * Time: 13:26
 */

<html>
<body>
<?php

include ('XmlParserExample1.php');

$parser = new XmlParserExample1(dirname(__FILE__).'/rss.xml');
$parser ->parse();
$result = $parser ->getResult();
echo $result;

?>
</body>
</html>