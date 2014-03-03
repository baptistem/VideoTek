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

    function __construct($title)
    {
        $this->title=$title;
    }
    public function show($view){
        require("Static/header.part.php");
         echo $view->show();
        require("Static/footer.part.php");
    }
}