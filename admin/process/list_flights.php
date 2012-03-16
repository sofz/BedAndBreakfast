<?php
// admin/process/list_flights.php
// GET : /?action=list_flights

$request = 'SELECT * FROM flights';
$query = Connexion::openDb()->query($request);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

include('./views/'.$action.'.php');
?>
