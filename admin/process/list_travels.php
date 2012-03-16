<?php
// admin/process/list_travels.php
// GET : /?action=list_travels

$request = 'SELECT * FROM travels';
$query = Connexion::openDb()->query($request);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

include('./views/'.$action.'.php');
?>
