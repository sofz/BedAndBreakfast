<?php

class Connexion {
    public static function openDb()
    {
        include ('../config/db.php');
        
        try
        {
            $pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $db = new PDO($dbconfig['driver'].':host='.$dbconfig['host'].';dbname='.$dbconfig['name'],$dbconfig['user'], $dbconfig['password'], $pdo_option);
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}

?>
