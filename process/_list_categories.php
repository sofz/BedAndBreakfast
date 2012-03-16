<?php
// process/list_categories.php
// ChildAction

$request = 'SELECT * FROM categories';
$query = Connexion::openDb()->query($request);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

include('./views/_list_categories.php');
?>
