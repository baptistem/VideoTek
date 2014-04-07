<?php
/**
 * Created by PhpStorm.
 * User: Damien
 * Date: 07/04/14
 * Time: 16:44
 */

class FilmEdit {
    public function show()
    {
        $htmlString = '<form method="post">
        <div>
        <label for="titre">Titre : </label>
        <INPUT type="text" name="titre">
        </div>
        <div>
        <label for="genre">Genre : </label>
        <INPUT type="text" name="genre">
        </div>
        <div>
        <label for="realisateur">Réalisateur : </label>
        <INPUT type="text" name="realisateur">
        </div>
        <div>
        <label for="annee">Année : </label>
        <INPUT type="text" name="annee">
        </div>
        <div>
        <label for="description">Description : </label>
        <textarea name="description" rows="3" cols="30"></textarea>
        </div>
        <div>
        <label for="acteurs">Acteurs (séparez d\'un saut à la ligne) : </label>
        <textarea name="acteurs" rows="5" cols="30"></textarea>
        </div>
        <INPUT TYPE="submit" NAME="ajouter" VALUE="Ajouter ce film">
        </form>';

        return $htmlString;
    }
}
