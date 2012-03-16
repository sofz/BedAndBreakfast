<?php
// process/details_hotels.php
// GET : /?action=details_hotelss&id=5

if(empty($_GET['id'])){
    header('location: ./');
}
else{
    $id = trim(htmlspecialchars($_GET['id']));
    
    //1 hotel
    // prendre les options
    $request = 'SELECT * FROM options o, hotels_options ho WHERE ho.id_hotel = :id AND ho.id_option = o.id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    $options = $query->fetchAll(PDO::FETCH_ASSOC);
    // hotel
    $request = 'SELECT * FROM hotels WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    $result = $query->fetch(PDO::FETCH_ASSOC);
}

include('./views/'.$action.'.php');
?>