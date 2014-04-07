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
        $htmlString ="\n<article>\n<div class='flexboxContainer'>\n";
        $index=0;
        foreach($this->films as $film){
            $htmlString.="<a  class='flexboxElement' href='?id=".$index."'>".$film->title."</a>\n";
            $index++;
            if ($index%4==0){
                $htmlString.="</div>\n<div class='flexboxContainer'>\n";
            }

        }
        $htmlString.="
        </div></article>";
        return $htmlString;
    }

}

