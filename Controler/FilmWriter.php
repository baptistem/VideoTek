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
        if($_SERVER['REMOTE_ADDR']!='10.0.8.2'){
        $content=false;
    }
        $xmlContent=fread(fopen("XML/db.xml",'r'),2000);;
        $array=preg_split('\n',$xmlContent);
        $act=preg_split('\n',$this->acteurs);
        array_pop($array);
        array_pop($array);
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
        var_dump($this->acteurs);
        foreach($this->acteurs as $acteur)
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
        $towrite=join('\n',$array);
        fwrite(fopen("XML/db.xml",'r'),$towrite);
    }
}