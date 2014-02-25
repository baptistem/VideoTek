<?php
/**
 * Created by PhpStorm.
 * User: arnaud
 * Date: 25/02/2014
 * Time: 15:14
 */

namespace View;


class FilmView {

/*
<article>
  <h1>%titre% (%annee%)</h1>
  <p>genre : %GENRE%</p>
  <p>%description%</p>
  <p>réalisé par %realisateur</p>
  avec:
  <ul>
    <li>%acteur%</li>
  </ul>
</article>
*/
    private $film;

    function __construct($film)
    {
        $this->film = $film;
    }

    public function show(){
        $htmlString = "<article>
            <h1>".$this->film->title." (".$this->film->year.")<h1>
            <p>".$this->film->genre."</p>
            <p>".$this->film->description."</p>
            <p>Réalisé par :".$this->film->realisator."</p>
            avec
            <ul>";
        foreach($this->film->actors as $actor){
            $htmlString.= "<li>".$actor."</li>";
        }
        $htmlString.= "</ul></article>";

        return $htmlString;
    }

}