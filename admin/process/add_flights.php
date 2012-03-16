<?php
// admin/process/add_flights.php
// GET : /?action=add_flights


if(empty($_POST)){
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    //traitement du post    
    $company_name = trim(htmlspecialchars($_POST['company_name']));
    $departure_datetime = trim(htmlspecialchars($_POST['departure_datetime']));
    $arrival_datetime = trim(htmlspecialchars($_POST['arrival_datetime']));
    $departure_airport = trim(htmlspecialchars($_POST['departure_airport']));
    $arrival_airport = trim(htmlspecialchars($_POST['arrival_airport']));
    $rates = trim(htmlspecialchars($_POST['rates']));
    
    $request = 'INSERT INTO flights (company_name, departure_datetime, arrival_datetime, departure_airport, arrival_airport, rates) VALUES (:company_name, :departure_datetime, :arrival_datetime, :departure_airport, :arrival_airport, :rates)';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('company_name' => $company_name, 'departure_datetime' => $departure_datetime, 'arrival_datetime' => $arrival_datetime, 'departure_airport' => $departure_airport, 'arrival_airport' => $arrival_airport, 'rates' => $rates));
    
    header('location: ./?action=list_flights');
}

?>
