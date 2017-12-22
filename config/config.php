<?php

$rep=__DIR__.'/../';

define("DUPLICATION", 23000);

$admin=NULL;
$nbNewsPerPage=10;
$count=NULL;

$dsn="mysql:host=localhost;dbname=dbadlenoir";
$login="root";
$password="";

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
