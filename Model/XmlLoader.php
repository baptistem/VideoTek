<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 14:48
 */


include "Film.php";

class XmlLoader {

    public $reader;
    public $films;
    private $film;
    private $actor;

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
        $this->film=false;
        $this->actor=false;
    }
    private function processNodeWithChild($node){
        if($node->hasChildNodes()){
            foreach($node->childNodes as $child){
                $this->processNodeWithChild($child);
            }
        }
        else{
            $this->processNode($node);
        }
    }
    private function processNode($node){
        if($node ===false) return;
        $path=explode("/",$node->getNodePath());
        $nodeName=array_pop($path);
        $nodeName=array_pop($path);
        $nodeName=str_replace("[","",$nodeName);
        $nodeName=str_replace("]","",$nodeName);
        $nodeName=preg_replace("(\d)","",$nodeName);
        switch($nodeName){
            case "films":
                if(!$this->film){
                    $this->films=array();
                }
                else{
                    $this->films[]=$this->film;
                }
                $this->film =new Film();
                break;
            case "titre":
                $this->film->setTitle($node->wholeText);
                break;
            case "genre":
                $this->film->setGenre($node->wholeText);
                break;
            case "realisateur":
                $this->film->setRealisator($node->wholeText);
                break;
            case "annee":
                $this->film->setYear($node->wholeText);
                break;
            case "acteurs":
                if (!$this->film->actors){
                    $this->film->setActors(array());
                }else{
                    $this->film->actors[]=$this->actors;
                }
                break;
            case "acteur":
                $actor=$node->nodeValue;
                break;
            case "description":
                $this->film->setDescription($node->wholeText);
                break;
        }


    }
}