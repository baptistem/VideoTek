<?php
/**
 * Created by PhpStorm.
 * User: arnaud
 * Date: 25/02/2014
 * Time: 16:09
 */


class FilmsView {

    private $films;

    function __construct($films)
    {
        $this->films = $films;
    }

    public function show(){
        $htmlString ="<article>
            <ul>";
        $index=0;
        foreach($this->films as $film){
            $index++;
            $htmlString.="<li>".$film->title."</li>";
        }
        $htmlString.="</ul>
        </article>";
        return $htmlString;
    }

} 