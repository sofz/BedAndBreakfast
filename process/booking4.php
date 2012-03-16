<?php
// process/booking4.php
// GET : /?action=booking4

function dateDiff($start, $end) 
{
  $start_ts = strtotime($start);
  $end_ts = strtotime($end);
  $diff = $end_ts - $start_ts;
  return round($diff / 86400);
}

if(empty($_POST)){
    // hotel
    $request = 'SELECT * FROM hotels WHERE id ='.$_SESSION['booking']['hotel_id'];
    $query = Connexion::openDb()->prepare($request);
    $query->execute();
    $hotel = $query->fetch(PDO::FETCH_ASSOC);
    // vol
    $request = 'SELECT * FROM flights WHERE id ='.$_SESSION['booking']['flight_id'];
    $query = Connexion::openDb()->prepare($request);
    $query->execute();
    $flight = $query->fetch(PDO::FETCH_ASSOC);
    // calcul du prix
    $nb_of_nights = dateDiff($_SESSION['booking']['start_date'], $_SESSION['booking']['end_date']);
    $flight_price = (float)$_SESSION['booking']['nb_of_travellers'] * $flight['rates'];
    $hotel_price = (float)$_SESSION['booking']['nb_of_travellers'] * $hotel['rates'] * (int)$nb_of_nights;
    $_SESSION['booking']['total_price'] = $flight_price + $hotel_price;
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    if($_POST['confirmation'] == "ok")
    {
        $request = 'INSERT INTO bookings (id_user, start_date, end_date, id_flight, id_hotel, nb_of_travellers, total_price) VALUES (:id_user, :start_date, :end_date, :id_flight, :id_hotel, :nb_of_travellers, :total_price)';
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('id_user' => $_SESSION['user_id'], 'start_date' => $_SESSION['booking']['start_date'], 'end_date' => $_SESSION['booking']['end_date'] , 'id_flight' => $_SESSION['booking']['flight_id'], 'id_hotel' => $_SESSION['booking']['hotel_id'], 'nb_of_travellers' => $_SESSION['booking']['nb_of_travellers'], 'total_price' => $_SESSION['booking']['total_price']));
    }
}
?>