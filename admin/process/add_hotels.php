<?php
// admin/process/add_hotels.php
// GET : /?action=add_hotels


if(empty($_POST)){
    //liste des options
    $request = 'SELECT * FROM options';
    $query = Connexion::openDb()->query($request);
    $options = $query->fetchAll(PDO::FETCH_ASSOC);
    
    //liste des voyages
    $request = 'SELECT * FROM travels';
    $query = Connexion::openDb()->query($request);
    $travels = $query->fetchAll(PDO::FETCH_ASSOC);
    
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
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
    // traitement de $_FILES : upload 2 fichiers photo
    include('./functions/uploadPhoto.php');
    $small_image = uploadPhoto($_FILES['small_image']);
    $large_image = uploadPhoto($_FILES['large_image']);
    
    $request = 'INSERT INTO hotels (name, small_texte, large_texte, latitude, longitude, stars, small_image, large_image, adress, zip_code, city, country, phone, rates) VALUES (:name, :small_texte, :large_texte, :latitude, :longitude, :stars, :small_image, :large_image, :adress, :zip_code, :city, :country, :phone, :rates)';
    $db = Connexion::openDb();
    $query = $db->prepare($request);
    $query->execute(array('name' => $name, 'small_texte' => $small_texte, 'large_texte' => $large_texte, 'latitude' => $latitude, 'longitude' => $longitude, 'stars' => $stars, 'small_image' => $small_image, 'large_image' => $large_image, 'adress' => $adress, 'zip_code' => $zip_code, 'city' => $city, 'country' => $country, 'phone' => $phone, 'rates' => $rates));
    
    //traitement des options
    $id_hotel = $db->lastInsertId(); // recup de l'ID de l'hotel
    foreach ($_POST['options'] as $id_option => $value) {
        if($value == "0" || $value == "1"){
            $request = 'INSERT INTO hotels_options (id_hotel, id_option, valueoption) VALUES (:id_hotel, :id_option, :valueoption)';
            $query = $db->prepare($request);
            $query->execute(array('id_hotel' => $id_hotel, 'id_option' => $id_option, 'valueoption' => $value));
        }
    }
    
    //traitement des voyages
    foreach ($_POST['travels'] as $id_travel => $value) {
            $request = 'INSERT INTO travels_hotels (id_hotel, id_travel) VALUES (:id_hotel, :id_travel)';
            $query = $db->prepare($request);
            $query->execute(array('id_hotel' => $id_hotel, 'id_travel' => $id_travel));
    }
    
    header('location: ./?action=list_hotels');
}

?>
