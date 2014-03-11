<?php
/**
 * Created by PhpStorm.
 * User: arnaud
 * Date: 04/03/2014
 * Time: 11:53
 */

class FileSystemReader {


    function __construct()
    {
    }

    function readfilm($path){
        $listfilms="";
        if (is_dir($path)) {
            if ($dh = opendir($path)) {
                while (($file = readdir($dh)) !== false) {
                    if (is_readable($path.$file)&&strpos(mime_content_type($path.$file), "video")!==false){
                        echo "fichier : ".$file."</br>";

                    }
                }
                closedir($dh);
            }
        }

        /*$MyPath = @opendir($path);
            echo "ok";
        if (true){
            echo "test";
            while($Entry = @readdir($MyPath)) {
                echo "boucle";
                if(is_dir($path.'/'.$Entry)&& $Entry != '.' && $Entry != '..') {
                    echo '<ul>'.$path;
                    ScanDirectory($path.'/'.$Entry);
                    echo '</ul>';
                }
                else {
                    echo '<li>'.$Entry.'</li>';
                }
            }
            @closedir($path);
        }*/

           return $listfilms;
    }

} 