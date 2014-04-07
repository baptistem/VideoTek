<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 14:48
 */
include 'Model/Film.php';

class XmlLoader{

    public $reader;
    public $films;
    private $film;
    private $actor;

    public function __construct()
    {

        $films= array();
        $this->reader=new XMLReader;
        $this->reader->open("XML/db.xml");
        $this->reader->read();
        $this->reader->next();
        $this->film=false;
        $this->actor=false;

    }

    /**
     * this method return all the element in the xml file
     */
    public function getAll(){
        $node=$this->reader->expand();
        //here we are at films, we loop on it
        $this->processNodeWithChild($node);
        $this->reader->close();

    }

    /**
     * this method return a simple film in order to avoid parsing the whole file
     * @param $id int the position in the film's array, in order to use the ->item($id) we need to *2+1 to avoid empty text node
     *
     */
    public function getFilmById($id){
        $id=$id*2+1;
        $node=$this->reader->expand();
        $mynode=$node->childNodes->item(1);
        $lastNode=$mynode->childNodes->item($id);
        $this->film =new Film();
        $this->processNodeWithChild($lastNode);
        $this->films=array();
        $this->films[]=$this->film;
        $this->reader->close();
    }

    /**
     * this method loop on children of a node
     * @param $node DOMElement an element to iterate on
     */
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

    /**
     * in order to know in what type of node we are we strip the path
     * @param $nodePath string like /foo/bar/baz
     * @return string like baz
     */
    private function cleanPath($nodePath){
        $path=explode("/",$nodePath);
        array_pop($path);
        $nodeName=array_pop($path);
        $nodeName=str_replace("[","",$nodeName);
        $nodeName=str_replace("]","",$nodeName);
        $nodeName=preg_replace("(\d)","",$nodeName);
        return $nodeName;
    }

    /**
     * work on a node
     * @param $node DOMText
     */
    private function processNode($node){
        if($node ===false) return;
        $nodeName=$this->cleanPath($node->getNodePath());
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
                if (!$this->actor){
                    $this->film->setActors(array());
                }else{
                    $this->film->addActor($this->actor);
                }
                break;
            case "acteur":

                $this->actor=$node->nodeValue;
                break;
            case "description":
                $this->film->setDescription($node->wholeText);
                break;
        }


    }
}