<?php

class FilmWriter
{

    private $titre;
    private $genre;
    private $realisateur;
    private $annee;
    private $description;
    private $acteurs;

    function __construct($titre, $genre, $realisateur, $annee, $description, $acteurs)
    {
        $this->titre = $titre;
        $this->genre = $genre;
        $this->realisateur = $realisateur;
        $this->annee = $annee;
        $this->description = $description;
        $this->acteurs = $acteurs;
    }

    public function write_in_XML()
    {
        $xmlContent=new XMLWriter("XML/db.xml");;
        $array=explode('\n',$xmlContent);

        var_dump($array);
        array_pop($array);
        array_pop($array);
        $array[]="<film>
        ";

        $array[]="<titre>
        ";
        $array[]=$this->titre."
        ";
        $array[]="</titre>
        ";

        $array[]="<genre>
        ";
        $array[]=$this->genre."
        ";
        $array[]="</genre>
        ";

        $array[]="<realisateur>
        ";
        $array[]=$this->realisateur."
        ";
        $array[]="</realisateur>
        ";

        $array[]="<annee>
        ";
        $array[]=$this->annee."
        ";
        $array[]="</annee>
        ";

        $array[]="<acteurs>
        ";
        foreach($this->acteurs as $acteur)
        {
            $array[]="</acteur>
            ";
            $array[]=$acteur."
            ";
            $array[]="</acteur>
            ";
        }
        $array[]="</acteurs>
        ";

        $array[]="<description>
        ";
        $array[]=$this->description."
        ";
        $array[]="</description>
        ";

        $array[]="</film>
        ";
        $array[]="</films>
        ";
        $array[]="</xml>";
        $towrite=join('\n',$array);
        file_put_contents("XML/db.xml",$towrite);
        return true;
    }
}
