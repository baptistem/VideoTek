<?php
/**
 * Created by PhpStorm.
 * User: arnaud
 * Date: 25/02/2014
 * Time: 15:14
 */
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
        $htmlString = "<section class='flexboxContainer'>
        <article class='flexboxElement' >
            <img alt='image for film' source='".$this->media."'/>
        </artice>
        <article>
            <h2>".$this->film->title." (".$this->film->year.")</h2>
            <p>".$this->film->genre."</p>
            <p>".$this->film->description."</p>
            <p>Réalisé par : ".$this->film->realisator."</p>
            avec
            <ul>";
        foreach($this->film->actors as $actor){
            $htmlString.= "<li>".$actor."</li>";
        }
        $htmlString.= "</ul>
        </article>";

        return $htmlString;
    }

}