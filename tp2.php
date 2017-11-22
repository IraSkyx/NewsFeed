<html>

<body>

<?php

require_once("model/Connection.php");
require_once("DAL/NewsGateway.php");

try{

    $NewsGat = new NewsGateway(new Connection());

     $News = array(
        'Title' => "La Xbox 360 noire avec HDMI et disque dur 120 Go ?",
        'Description' => "Le 11 janvier dernier, une nouvelle rumeur concernant une possible &#171; nouvelle Xbox 360 &#187; am&#233;lior&#233;e &#224; vue le jour. Connue sous le nom de code &#171; Zephyr &#187;, cette Xbox de couleur noire pourrait inclure un [...]",
        'Link' => "http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html",
        'Guid' => "http://www.clubic.com/actualite-69593-xbox-360-hdmi-120-go-noire.html",
        'PubDate' => "Mon, 12 Feb 2007 14:01:28 +0100",
        'Category' => "Console"
    );

    $NewsGat->Insert($News['Title'],$News['Description'],$News['Link'],$News['Guid'],$News['PubDate'],$News['Category']);

    foreach ($NewsGat->GetAll() as $row){
        print $row['PubDate'];
    }
 
}
catch( PDOException $Exception ) {
    echo $Exception->getMessage();
}
?>

</body>
</html>
