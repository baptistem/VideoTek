<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 14:48
 */



use XMLReader;

class XmlLoader {

    public $reader;
    public $films;

    public function __construct()
    {

        $films= array();
        $this->reader=new XMLReader;
        $this->reader->read("../XML/db.xml");

        while($this->reader->read()){
            $this->processNode($this->reader->expand()->childNodes[0]);
        }
    }
    private function processNode($node){
        if($node ===false) return;
        $film=false;
        $actor=false;
        switch($node->nodeName){
            case "films":
            case "videotheque":
                $this->processNode($this->reader->expand()->childNodes[0]);
                break;
            case "film":
                if(!$film){
                    $this->films=array();
                }
                else{
                    $this->films[]=$film;
                }
                $film=new Film();
                break;
            case "titre":
                $film->title=$node->nodeValue;
                break;
            case "genre":
                $film->genre=$node->nodeValue;
                break;
            case "realisateur":
                $film->realisator=$node->nodeValue;
                break;
            case "annee":
                $film->annee=$node->nodeValue;
                break;
            case "acteurs":
                if (!$actor){
                    $film->actors=array();
                }else{
                  $film->actors[]=$actor;
                }
                break;
            case "acteur":
                $actor=$node->nodeValue;
                break;
            case "description":
                $film->description=$node->nodeValue;
                break;
        }
                $this->films[]=$film;

    }
}