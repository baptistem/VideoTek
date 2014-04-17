<?php
/**
 * Created by PhpStorm.
 * User: arnaud
 * Date: 25/02/2014
 * Time: 15:06
 */

class Film {
    public $title;
    public $genre;
    public $year;
    public $realisator;
    public $actors=false;
    public $description;
    public $media;

    /**
     * @param string $actors
     */
    public function setActors($actors)
    {
        $this->actors = $actors;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @param string $realisator
     */
    public function setRealisator($realisator)
    {
        $this->realisator = $realisator;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    public function addActor($actor){
        $this->actors[]=$actor;
    }

    public function setMedia($media){
        $this->media = $media;
    }

    function __toString()
    {
        $xmlfilm = "<film>
			<titre>".$this->title."</titre>
			<genre>".$this->genre."</genre>
			<realisateur>".$this->realisator."</realisateur>
			<annee>".$this->year."</annee>
			<acteurs>";
        foreach ($this->actors as $actor) {
            $xmlfilm.="<acteur>".$actor."</acteur>";
        }
        $xmlfilm.="</acteurs>
			<description>".$this->description."</description>
			<media>".$this->media."</media>
		</film>";
        return $xmlfilm;
    }

}
