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
include 'View/FilmEdit.php';
include 'Controler/FilmWriter.php';
include 'Controler/XmlLoader.php';
include 'View/FileSystemReader.php';


$xmlLoader = new XmlLoader();

//we handle here every mapping
if($_GET && array_key_exists("id",$_GET)){
   $xmlLoader->getFilmById($_GET["id"],array_key_exists("edit",$_GET));
}
else if($_GET && array_key_exists('new',$_GET)){
    $xmlLoader->films=[];
}
else if ($_POST && array_key_exists("titre",$_POST) && array_key_exists("genre",$_POST) && array_key_exists("realisateur",$_POST)
    && array_key_exists("annee",$_POST) && array_key_exists("description",$_POST) && array_key_exists("acteurs",$_POST))
{
    $FilmWriter = new FilmWriter($_POST["titre"], $_POST["genre"], $_POST["realisateur"], $_POST["annee"],
        $_POST["description"], preg_split('\n',$_POST["acteurs"]));
    if(!$FilmWriter->write_in_XML()){
       $site = new Site("Erreur",null);
       $site->setError("401",401,"not authorized, you must be in local to change/view films");
       $site->show();
       return;
    };
}
else if($_GET && array_key_exists("edit",$_GET)){
    $site = new Site("Erreur",null);
    $site->setError("401",401,"not authorized, you must be in local to change/view films");
    $site->show();
    return;
}
else{
   $xmlLoader->getAll();
}
$site = new Site("Videotek",$xmlLoader->films);
$site->show();
