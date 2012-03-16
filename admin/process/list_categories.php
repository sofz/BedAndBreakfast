<?php
// admin/process/list_categories.php
// GET : /?action=list_categories

$request = 'SELECT * FROM categories';
$query = Connexion::openDb()->query($request);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

include('./views/'.$action.'.php');
?>
