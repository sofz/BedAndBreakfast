<?php
// admin/process/deconnexion.php
// GET : /?action=deconnexion

session_destroy();

header('location: ./');
?>
