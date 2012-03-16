<?php
// process/list_travels.php
// GET : /?action=list_hotels&id_travel=5
// GET : /?action=list_hotels

// TODO : pagination

if(empty($_GET['id_travel'])){
    //name category
    $title = "Liste de tous nos hotels";
    //selected travels
    $request = 'SELECT h.id AS id, h.small_image AS image, h.name AS name, h.small_texte AS texte FROM hotels h';
    $query = Connexion::openDb()->prepare($request);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $id = trim(htmlspecialchars($_GET['id_travel']));
    // name travel
    $request = 'SELECT * FROM travels WHERE id = :id_travel';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id_travel' => $id));
    $result = $query->fetch();
    $title = $result['title'];
    
    //all hotels
    $request = 'SELECT h.id AS id, h.small_image AS image, h.name AS name, h.small_texte AS texte FROM hotels h, travels t, travels_hotels th WHERE th.id_travel = :id_travel AND h.id = th.id_hotel AND t.id = th.id_travel';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id_travel' => $id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

include('./views/'.$action.'.php');
?>
