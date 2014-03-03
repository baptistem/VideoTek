<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 14:48
 */




class XmlLoader {

    public $reader;
    public $films;

    public function __construct()
    {

        $films= array();
        $this->reader=new XMLReader;
        $this->reader->open("http://localhost/v/XML/db.xml");
        $this->reader->read();
        $this->reader->next();
        $node=$this->reader->expand();
        //here we are at films, we loop on it
        $this->processNodeWithChild($node);
    }
    private function processNodeWithChild($node){
        if($node->hasChildNodes()){
            foreach($node->childNodes as $child){
                $this->processNodeWithChild($node);
            }
        }
        else{
            $this->processNode($node);
        }
    }
    private function processNode($node){
        if($node ===false) return;
        $film=false;
        $actor=false;
        echo $node->nodeName;
        switch($node->nodeName){
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