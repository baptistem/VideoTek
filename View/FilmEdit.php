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
        $htmlString = '<form method="post" action ="/v/index.php">
        <label for="titre">Titre</label>
        <INPUT type="text" name="titre">

        <label for="genre">Genre</label>
        <INPUT type="text" name="genre">
        <label for="realisateur">Réalisateur</label>
        <INPUT type="text" name="realisateur">
        <label for="annee">Année </label>
        <INPUT type="text" name="annee">
        <label for="description">Description </label>
        <textarea name="description" rows="3" cols="30"></textarea>
        <label for="acteurs">Acteurs (séparés d\'un retour à la ligne) </label>
        <textarea name="acteurs" rows="5" cols="30"></textarea>
        <INPUT TYPE="submit" NAME="ajouter" VALUE="Ajouter ce film">
        </form>';

        return $htmlString;
    }
}
