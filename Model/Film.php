<?php
/**
 * Created by PhpStorm.
 * User: arnaud
 * Date: 25/02/2014
 * Time: 15:06
 */

namespace Model;


class Film {
    public $title;
    public $genre;
    public $year;
    public $realisator;
    public $actors;
    public $desciption;

    function __construct($actors, $year, $desciption, $realisator, $genre, $title)
    {
        $this->actors = $actors;
        $this->year = $year;
        $this->desciption = $desciption;
        $this->realisator = $realisator;
        $this->genre = $genre;
        $this->title = $title;
    }


}
