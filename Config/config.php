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
$views['error']='views/Error.php';
$views['login']='views/Login.php';
$views['home']='views/Home.php';
$views['404']='views/404.php';
$views['news']='views/News.php';

$contents['head']='views/contents/Head.php';
$contents['header']='views/contents/Header.php';
$contents['scripts']='views/contents/Scripts.php';
$contents['footer']='views/contents/Footer.php';
