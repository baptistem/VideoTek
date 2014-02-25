<?php
/**
 * Created by PhpStorm.
 * User: arnaud
 * Date: 25/02/2014
 * Time: 16:09
 */

namespace View;



class FilmsView {

    private $films;

    function __construct($films)
    {
        $this->films = $films;
    }

    function show(){
        $htmlString ="<article>
            <ul>";
        foreach($this->films->title as $titles){
            $htmlString.="li>".$titles."</li>";
        }
        $htmlString.="</ul>
        </article>";

    }

} 