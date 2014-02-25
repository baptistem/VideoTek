<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 14:45
 */

use View\FilmsView;
use View\FilmView;
use View\Site;
use Model\XmlLoader;


$xmlLoader = new XmlLoader();

$site = new Site("Videothek Damien");
var_dump($xmlLoader->films);
$content= new FilmsView($xmlLoader->films);
$site->show($content);
