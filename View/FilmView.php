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

    public function show($film){
    private $htmlString;
        $htmlString = "<article><h1>".$film->title."<h1><p>".$film.genre."</p><p>"$film.description."</p><p>Réalisé par :";

    }
}