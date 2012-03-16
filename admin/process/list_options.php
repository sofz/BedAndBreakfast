<?php
// admin/process/list_options.php
// GET : /?action=list_options

$request = 'SELECT * FROM options';
$query = Connexion::openDb()->query($request);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

include('./views/'.$action.'.php');
?>
