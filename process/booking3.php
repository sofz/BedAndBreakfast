<?php
// process/booking3.php
// GET : /?action=booking3

if(empty($_POST)){
    $request = 'SELECT * FROM hotels WHERE id ='.$_SESSION['booking']['hotel_id'];
    $query = Connexion::openDb()->prepare($request);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $country = $result['country'];
    
    $request = 'SELECT * FROM flights WHERE arrival_airport = :country';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('country' => $country));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    //print_r($_POST); print_r($_SESSION);
    $flight_id = trim(htmlspecialchars($_POST['flight_id']));
    $booking = $_SESSION['booking'];
    $booking['flight_id'] = $flight_id;
    $_SESSION['booking'] = $booking;
    header('location : ./?action=booking4');
}
?>