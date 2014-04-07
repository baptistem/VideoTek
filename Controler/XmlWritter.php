<?php

include 'Model/Film.php';

class XmlWriter
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
        $content=readfile("XML/db.xml");
        $array=preg_split('\n',$content);
        $act=preg_split('\n',$this->acteurs);
        $array.pop();
        $array.pop();

        $array[]="<film>\n";

        $array[]="<titre>\n";
        $array[]=$this->titre."\n";
        $array[]="</titre>\n";

        $array[]="<genre>\n";
        $array[]=$this->genre."\n";
        $array[]="</genre>\n";

        $array[]="<realisateur>\n";
        $array[]=$this->realisateur."\n";
        $array[]="</realisateur>\n";

        $array[]="<annee>\n";
        $array[]=$this->annee."\n";
        $array[]="</annee>\n";

        $array[]="<acteurs>\n";
        foreach($act as $acteur)
        {
            $array[]="</acteur>\n";
            $array[]=$acteur."\n";
            $array[]="</acteur>\n";
        }
        $array[]="</acteurs>\n";

        $array[]="<description>\n";
        $array[]=$this->description."\n";
        $array[]="</description>\n";

        $array[]="</film>\n";
        $array[]="</films>\n";
        $array[]="</xml>";
    }
}