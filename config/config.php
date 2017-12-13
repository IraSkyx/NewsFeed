<?php

$rep=__DIR__.'/../';

$admin=NULL;
$nbNewsPerPage=1;

//Config Adrien
//$dsn="mysql:host=localhost;dbname=dbadlenoir";
//$login="root";
//$password="";

//Config Gabin
$dsn="mysql:host=localhost;dbname=dbadlenoir";
$login="root";
$password="root";

//Config IUT
//$dsn="mysql:host=hina;dbname=dbadlenoir";
//$login="adlenoir";
//$password="adlenoir";

//Views
$views['error']='views/Error.php';
$views['login']='views/Login.php';
$views['home']='views/Home.php';
$views['404']='views/404.php';
$views['viewFlux']='views/ViewFlux.php';
$views['index']='index.php';

$contents['head']='views/contents/Head.php';
$contents['header']='views/contents/Header.php';
$contents['scripts']='views/contents/Scripts.php';
$contents['footer']='views/contents/Footer.php';
