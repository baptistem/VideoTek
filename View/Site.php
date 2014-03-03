<?php
/**
 * Created by PhpStorm.
 * User: kolo
 * Date: 25/02/14
 * Time: 15:10
 */


class Site {

    public $title;
    public $header;
    public $content;

    function __construct($title,$films,$isEdit)
    {
        $this->title=$title;
        if(count($films)==1){
            $this->content=new FilmView($films[0]);
        }
        else if (count($films)>1){
            $this->content=new FilmsView($films);
        }
        else{
            $this->content=new ErrorView(503,"aucun film disponible");
        }
    }
    public function show(){
        //title is used in header
        $title=$this->title;
        require("Static/header.part.php");
        echo $this->content->show();
        require("Static/footer.part.php");
    }
}