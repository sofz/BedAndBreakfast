<?php
if (!empty($_SESSION['role']) && $_SESSION['role'] == 2){
    echo '<a href="./admin/">Administration</a>';
}
?>
