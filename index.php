<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 14:45
 */

//namespace Videotek;

include 'View/FilmsView.php';
include 'View/FilmView.php';
include 'View/Site.php';
include 'View/ErrorView.php';
include 'Controler/XmlLoader.php';

include 'View/FileSystemReader.php';

$test = new FileSystemReader();

$test->readfilm("/Users/arnaud/Movies/");

/*$xmlLoader = new XmlLoader();

if($_GET && array_key_exists("id",$_GET)){
   $xmlLoader->getFilmById($_GET["id"],array_key_exists("edit",$_GET));
}
else{
   $xmlLoader->getAll();
}
$site = new Site("Videotek Damien",$xmlLoader->films,false);
$site->show();*/
