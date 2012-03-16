<?php
session_start();
if(empty($_GET['action']) || !file_exists('./process/'.$_GET['action'].'.php'))
{
    header('location: ./?action=list_travels');
}
include('./process/Connexion.class.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Travel Agency ::: Front End</title>
        <link rel="stylesheet" type="text/css" href="./css/reset.css" />
        <link rel="stylesheet" type="text/css" href="./css/styles.css" />
        <script type="text/javascript" src="./js/modernizr-2.0.6.js"></script>
        <script type="text/javascript" src="./js/jquery-1.6.4.min.js"></script>
    </head>
    <body>
        <div id="container">
            <header id="header">
            <ul>
                <li><a href="./">Accueil</a></li>
                <!-- login menu-->
                <?php include('./views/_login_menu.php') ?>
            </ul>
            </header>
            <nav id="main_nav">
                <!-- liste des catégories -->
                <?php include ('./process/_list_categories.php') ?>
            </nav>
            <div id="main_content">
                <?php
                    $action = trim(htmlspecialchars($_GET['action']));
                    include('./process/'.$action.'.php');
                ?>
            </div>
            <div id="side_bar">
                <!-- TODO : include : liste des voyages les plus commandés -->
            </div>
            <div class="clearfix"></div>
            <footer id="footer">
                &copy; So - 2012 - <?php /*menu admin : */include('./views/_admin_menu.php') ?>
            </footer>
        </div>
    </body>
</html>