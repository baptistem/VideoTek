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
include 'Model/XmlLoader.php';


$xmlLoader = new XmlLoader();

$site = new Site("Videothek Damien");
$content= new FilmsView($xmlLoader->films);
$site->show($content);
