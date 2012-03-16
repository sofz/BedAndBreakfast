<?php
// admin/process/inscription.php
// GET : /?action=inscription

if(empty($_POST)){
    $error = "";
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    //traitement du post    
    $email = trim(htmlspecialchars($_POST['email']));
    $password = md5(trim(htmlspecialchars($_POST['password'])));
    $adress = trim(htmlspecialchars($_POST['adress']));
    $zip_code = trim(htmlspecialchars($_POST['zip_code']));
    $city = trim(htmlspecialchars($_POST['city']));
    $country = trim(htmlspecialchars($_POST['country']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $birthdate = trim(htmlspecialchars($_POST['birthdate']));
    
    $request = 'INSERT INTO users (email, password, adress, zip_code, city, country, phone, birthdate) VALUES (:email, :password, :adress, :zip_code, :city, :country, :phone, :birthdate)';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('email' => $email, 'password' => $password, 'adress' => $adress, 'zip_code' => $zip_code, 'city' => $city, 'country' => $country, 'phone' => $phone, 'birthdate' => $birthdate));
    $count = $query->rowCount();
    if($count == 1)
    {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('location: ./');
    }
    else
    {
        $error = "Une erreur esr survenue lors de l'inscription, veuillez réessayer";
        include('./views/'.$action.'.php');
    }
}
?>