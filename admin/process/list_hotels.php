<?php
// admin/process/list_hotels.php
// GET : /?action=list_hotels

$request = 'SELECT * FROM hotels';
$query = Connexion::openDb()->query($request);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

include('./views/'.$action.'.php');
?>
