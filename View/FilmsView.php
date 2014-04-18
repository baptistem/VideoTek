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
        $htmlString ="
        <article class='flexboxContainer'>
            <ul class='flexboxElement flexboxContainer'>
        ";
        $index=0;
        $highlight="";
        foreach($this->films as $film){
            $htmlString.="<li  class='flexboxElement ".$highlight." '>
            <a href='?id=".$index."'>".$film->title."</a>
            </li>\n";
            $index++;
            if(rand(0,8)==2){
                $highlight=" highlight ";
            }
            else{
                $highlight="";
            }

        }
        $htmlString.="
        </ul></article>";
        return $htmlString;
    }

}

