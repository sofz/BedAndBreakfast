<?php
if(empty($_SESSION['user_id'])){
    echo '<li><a href="./?action=connexion">Connexion</a></li>';
    echo '<li><a href="./action=inscription">Inscription</a></li>';
}
else{
    echo '<li><a href="./?action=deconnexion">Deconnexion</a></li>';
    echo '<li><a href="#">Mon compte</a></li>';
}
?>
