<?php
session_start();
/*if($_SESSION['rank'] != 2)
{
    header('location:../');
}*/
if(empty($_GET['action']))
{
    header('location: ./?action=home');
}
include('./process/Connexion.class.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Travel Agency ::: Back End</title>
        <link rel="stylesheet" type="text/css" href="./css/reset.css" />
        <link rel="stylesheet" type="text/css" href="./css/styles.css" />
        <script type="text/javascript" src="./js/modernizr-2.0.6.js"></script>
        <script type="text/javascript" src="./js/jquery-1.6.4.min.js"></script>
    </head>
    <body>
        <div id="container">
            <header id="header">
                <a href="./">HEADER</a>
            </header>
            <nav id="main_nav">
                <li><a href="./?action=list_categories">Gérer les catégories</a></li>
                <li><a href="./?action=list_travels">Gérer les voyages</a></li>
                <li><a href="./?action=list_hotels">Gérer les hotels</a></li>
                <li><a href="./?action=list_flights">Gérer les vols</a></li>
            </nav>
            <div id="main_content">
                <?php
                    $action = trim(htmlspecialchars($_GET['action']));
                    include('./process/'.$action.'.php');
                ?>
            </div>
            <div id="side_bar">
                SIDE BAR
            </div>
            <div class="clearfix"></div>
            <footer id="footer">
                &copy; So - 2012 - <a href="../">Accueil front end</a>
            </footer>
        </div>
    </body>
</html>
