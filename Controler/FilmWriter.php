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
        $string="<film>
        <titre>
        ";
        $string.=$this->titre."
        ";
        $string.="</titre>
        <genre>
        ";
        $string.=$this->genre."
        ";
        $string.="</genre>
        ";

        $string.="<realisateur>
        ";
        $string.=$this->realisateur."
        ";
        $string.="</realisateur>
        ";

        $string.="<annee>
        ";
        $string.=$this->annee."
        ";
        $string.="</annee>
        ";

        $string.="<acteurs>
        ";
        foreach($this->acteurs as $acteur)
        {
            $string.="</acteur>
            ";
            $string.=$acteur."
            ";
            $string.="</acteur>
            ";
        }
        $string.="</acteurs>
        ";

        $string.="<description>
        ";
        $string.=$this->description."
        ";
        $string.="</description>
        ";

        $string.="</film>
        ";
        $string.="</films>
</videotheque>
        ";
        $string.="</xml>";
        $content=file_get_contents("XML/db.xml");
        str_replace(' </films>','',$content);
        str_replace('</videotheque>','',$content);
        str_replace('</xml>','',$content);
        $content.=$string;
        file_put_contents("XML/db.xml",$content);
        return true;
    }
}
