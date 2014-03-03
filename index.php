<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 14:45
 */

include 'View/FilmsView.php';
include 'View/FilmView.php';
include 'View/Site.php';
include 'View/ErrorView.php';
include 'Model/XmlLoader.php';
$xmlLoader = new XmlLoader();

if($_GET && array_key_exists("id",$_GET)){
   $xmlLoader->getFilmById($_GET["id"],array_key_exists("edit",$_GET));
}
else{
   $xmlLoader->getAll();
}
$site = new Site("Videothek Damien",$xmlLoader->films,false);
$site->show();
