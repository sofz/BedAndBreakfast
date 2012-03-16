<?php

function uploadPhoto($files) {
    $uploads_directory = '../images/';
    
        if ($files['tmp_name']) 
         {
            $tmp_file = $files['tmp_name'];

            if (!is_uploaded_file($tmp_file))
                die('Le fichier est introuvable');

            $type_file = $files['type'];

            if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif'))
                die('Le fichier n\'est pas une image');

            $basefilename = $files['name'];
            $searchinfilename = array('@[éèêëÊË]@i', '@[àâäÂÄ]@i', '@[îïÎÏ]@i', '@[ûùüÛÜ]@i', '@[ôöÔÖ]@i', '@[ç]@i', '@[ ]@i', '@[^a-zA-Z0-9_.]@');
            $replaceinfilename = array('e', 'a', 'i', 'u', 'o', 'c', '_', '');
            $finalfilename = uniqid() . '-' . preg_replace($searchinfilename, $replaceinfilename, $basefilename);

            if (!move_uploaded_file($tmp_file, $uploads_directory . $finalfilename))
                die('Impossible de copier le fichier dans ' . $uploads_directory);
        }
    
    return $finalfilename;
}

?>
