<?php

require_once("../getid/getid3/getid3.php");


         $getID3 = new getID3;

            if ($handle = opendir('../media/')) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {

                //echo $file;
                $Info = $getID3->analyze("../media/" .$file);

                // Delete temporary file
              //  $filename = $Info['filename'];
                $filesize = $Info['filesize'];
                $filename = $Info['filepath'];
                $filename = $Info['fileformat'];
                $filename = $Info['audio']['sample_rate'];

                echo $filename ."<br>";
               
                }
            }
closedir($handle);

    }
?>