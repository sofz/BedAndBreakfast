<?php
// admin/process/edit_hotels.php
// GET : /?action=edit_hotels&id=5

if(empty($_POST)){
    if(!empty($_GET['id'])){
        $id = trim(htmlspecialchars($_GET['id']));
        
        $request = 'SELECT * FROM hotels WHERE id = :id';
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('id' => $id));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        //liste des options
        $request = 'SELECT * FROM options';
        $query = Connexion::openDb()->query($request);
        $options = $query->fetchAll(PDO::FETCH_ASSOC);
        
        //liste des options de l'hotel
        $request = 'SELECT * FROM hotels_options WHERE id_hotel = :id';
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('id' => $id));
        $tmp_hotel_options = $query->fetchAll(PDO::FETCH_ASSOC);
        // pour utiliser la fonction in_array, il fait un array simple alors que le résultat de la query donne un array d'array
        $hotel_options = array();
        foreach ($tmp_hotel_options as $value) {
            $hotel_options[$value['id_option']] = $value['valueoption'];
        }
        
        //liste des voyages
        $request = 'SELECT * FROM travels';
        $query = Connexion::openDb()->query($request);
        $travels = $query->fetchAll(PDO::FETCH_ASSOC);
        
        //liste des voyages de l'hotel
        $request = 'SELECT id_travel AS id FROM travels_hotels WHERE id_hotel = :id';
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('id' => $id));
        $tmp_hotel_travels = $query->fetchAll(PDO::FETCH_ASSOC);
        // pour utiliser la fonction in_array, il fait un array simple alors que le résultat de la query donne un array d'array
        $hotel_travels = array();
        foreach ($tmp_hotel_travels as $value) {
            $hotel_travels[] = $value['id'];
        }
        
        include('./views/'.$action.'.php');
    }
    else{
        header('location : ./');
    }
}

// POST ************************************************************************
else{
    $id = trim(htmlspecialchars($_GET['id']));
    
    //traitement du post   
    $name = trim(htmlspecialchars($_POST['name']));
    $small_texte = trim(htmlspecialchars($_POST['small_texte']));
    $large_texte = trim(htmlspecialchars($_POST['large_texte']));
    $latitude = trim(htmlspecialchars($_POST['latitude']));
    $longitude = trim(htmlspecialchars($_POST['longitude']));
    $stars = trim(htmlspecialchars($_POST['stars']));
    $adress = trim(htmlspecialchars($_POST['adress']));
    $zip_code = trim(htmlspecialchars($_POST['zip_code']));
    $city = trim(htmlspecialchars($_POST['city']));
    $country = trim(htmlspecialchars($_POST['country']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $rates = trim(htmlspecialchars($_POST['rates']));
    
    $request = 'UPDATE hotels SET name = :name, small_texte = :small_texte, large_texte = :large_texte, latitude = :latitude, longitude = :longitude, stars = :stars, adress = :adress, zip_code = :zip_code, city = :city, country = :country, phone = :phone, rates = :rates WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('name' => $name, 'small_texte' => $small_texte, 'large_texte' => $large_texte, 'latitude' => $latitude, 'longitude' => $longitude, 'stars' => $stars, 'adress' => $adress, 'zip_code' => $zip_code, 'city' => $city, 'country' => $country, 'phone' => $phone, 'rates' => $rates, 'id' => $id));
    
    //traitement des options
    //1 - supprimer les liens actuels
    $request = 'DELETE FROM hotels_options WHERE id_hotel = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    //2 - recréer les liens sur base du POST
    foreach ($_POST['options'] as $id_option => $value) {
        if($value == "0" || $value == "1"){
            $request = 'INSERT INTO hotels_options (id_hotel, id_option, valueoption) VALUES (:id_hotel, :id_option, :valueoption)';
            $query = Connexion::openDb()->prepare($request);
            $query->execute(array('id_hotel' => $id, 'id_option' => $id_option, 'valueoption' => $value));
        }
    }
    
    //traitement des voyages
    ////1 - supprimer les liens actuels
    $request = 'DELETE FROM travels_hotels WHERE id_hotel = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    //2 - recréer les liens sur base du POST
    foreach ($_POST['travels'] as $id_travel => $value) {
            $request = 'INSERT INTO travels_hotels (id_hotel, id_travel) VALUES (:id_hotel, :id_travel)';
            $query = Connexion::openDb()->prepare($request);
            $query->execute(array('id_hotel' => $id, 'id_travel' => $id_travel));
    }
    
    header('location: ./?action=list_hotels');
}
?>