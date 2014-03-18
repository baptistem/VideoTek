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
        $xmldate = gmdate('Ymdhms', filemtime("XML/db.xml"));
        $listfilms=array();
        $i=0;
        if (is_dir($path)) {
            if ($dh = opendir($path)) {
                while (($file = readdir($dh)) !== false) {
                    if ( strpos($file,".") === 0){
                        continue;
                    }
                    if (is_dir($path.$file)){
                        //echo ($path.$file)
                        $aAjouter=array();
                        $aAjouter = $this->readfilm($path.$file."/");
                        //array_push($listfilms, $aAjouter);
                        $listfilms=array_merge($listfilms,$aAjouter);
                        $i+=sizeof($aAjouter);
                    }
                    else{
                        $filedate = gmdate('Ymdhms', filemtime($path.$file))."</br>";
                        if($filedate>=$xmldate){
                            //echo $file."</br>";
                            $listfilms[$i]=pathinfo($file, PATHINFO_FILENAME);//récupére le nom du fichier sans l'extension
                            $i +=1;
                        }
                    }

                    /*if (strpos(mime_content_type($path.$file), "directory") && !strpos($file, ".") == 0){
                        echo "toto";
                        $listfilms.= $this->readfilm($path.$file);
                    }
                    if (is_readable($path.$file)&&strpos(mime_content_type($path.$file), "video")!==false){
                        echo "fichier : ".$file."</br>";
                    }*/
                }
                closedir($dh);
            }
            return $listfilms;
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