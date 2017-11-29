<?php

$rep=__DIR__.'/../';


//Config adrien
$dsn="mysql:host=localhost;dbname=dbadlenoir";
$login="root";
$password="";

//Config IUT
//$dsn="mysql:host=hina;dbname=dbadlenoir";
//$login="adlenoir";
//$password="adlenoir";

//Views
$views['error']='Views/Error.php';
$views['login']='Views/Login.php';
$views['home']='Views/Home.php';

$contents['head']='Views/Contents/Head.php';
$contents['header']='Views/Contents/Header.php';
$contents['scripts']='Views/Contents/Scripts.php';
$contents['footer']='Views/Contents/Footer.php';
