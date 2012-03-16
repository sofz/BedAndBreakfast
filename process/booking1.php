<?php
// process/booking1.php
// GET : /?action=booking1&id=5

if(empty($_POST)){
    //si pas id hotel = erreur -> retour home
    if(empty($_GET['id']))
    {
        header('location: ./');
    }

    // sinon démarre le process de booking, met l'id hotel en session
    $booking = array();
    $booking['hotel_id'] = trim(htmlspecialchars($_GET['id']));
    $_SESSION['booking'] = $booking;

    // vérifie que l'utilisateur est loggé sinon renvoit vers connexion
    if(empty($_SESSION['user_id']))
    {
        header('location: ./?action=connexion');
    }

    // sinon demande vérification des données
    $request = 'SELECT * FROM users WHERE id = '.$_SESSION['user_id'];
    $query = Connexion::openDb()->prepare($request);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $error = "";
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    $adress = trim(htmlspecialchars($_POST['adress']));
    $zip_code = trim(htmlspecialchars($_POST['zip_code']));
    $city = trim(htmlspecialchars($_POST['city']));
    $country = trim(htmlspecialchars($_POST['country']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    
    if($adress == null || $zip_code == null || $city == null || $country == null || $phone == null || $birthdate == null)
    {
        // le formulaire n'est pas complet, le recompléter
        $error = "Tous les champs sont obligatoires";
        $request = 'SELECT * FROM users WHERE id = '.$_SESSION['user_id'];
        $query = Connexion::openDb()->prepare($request);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        include('./views/'.$action.'.php');
    }
    else
    {
        $request = 'UPDATE users SET adress = :adress, zip_code = :zip_code, city = :city, country = :country, phone = :phone, birthdate = :birthdate WHERE id = '.$_SESSION['user_id'];
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('adress' => $adress, 'zip_code' => $zip_code, 'city' => $city, 'country' => $country, 'phone' => $phone, 'birthdate' => $birthdate));
        header('location: ./?action=booking2');
    }
}
?>
