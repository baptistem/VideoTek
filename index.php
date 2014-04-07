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

/*$test = new FileSystemReader();
$test2 = array();

$test2 = $test->readfilm("/Users/arnaud/Movies/");

$taille = sizeof($test2);
foreach($test2 as $valeur){
    echo "</br>".$valeur;
}*/

/*include 'Lib/Allocine.php';

define('ALLOCINE_PARTNER_KEY', '100043982026');
define('ALLOCINE_SECRET_KEY', '29d185d98c984a359e6e6f26a0474269');

$allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);

$result = $allocine->search('Arrow');

echo $result;¨/

/*for($i=0; $i<$taille; $i++)
{
    echo $test2[$i].'<br/>';
}*/

$xmlLoader = new XmlLoader();
$xmlWritter;

if($_GET && array_key_exists("id",$_GET)){
   $xmlLoader->getFilmById($_GET["id"],array_key_exists("edit",$_GET));
}
else if ($_POST && array_key_exists("titre",$_POST) && array_key_exists("genre",$_POST) && array_key_exists("realisateur",$_POST)
    && array_key_exists("annee",$_POST) && array_key_exists("description",$_POST) && array_key_exists("acteurs",$_POST))
{
    $xmlWritter = new XmlWriter($_POST["titre"], $_POST["genre"], $_POST["realisateur"], $_POST["annee"],
        $_POST["description"], $_POST["acteurs"]);
}
else{
   $xmlLoader->getAll();
}
$site = new Site("Videotek Damien",$xmlLoader->films,false);
$site->show();
