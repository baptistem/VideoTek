<?php

class Site {

    public $title;
    public $header;
    public $content;
    function setError($title,$errno,$msg){
        $this->content=new ErrorView($errno,$msg);

    }
    function __construct($title,$films)
    {
        $this->title=$title;
        if(count($films)==0){
            $this->content=new FilmEdit();
        }
        else if(count($films)==1){
            $this->content=new FilmView($films[0]);
        }
        else if (count($films)>1){
            $this->content=new FilmsView($films);
        }
        else{
            $this->title="";
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