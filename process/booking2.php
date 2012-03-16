<?php
// process/booking2.php
// GET : /?action=booking2

if(empty($_POST)){
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    $nb_of_travellers = trim(htmlspecialchars($_POST['nb_of_travellers']));
    $start_date = trim(htmlspecialchars($_POST['start_date']));
    $end_date = trim(htmlspecialchars($_POST['end_date']));
    
    if(strtotime($end_date) > strtotime($start_date))
    {
        $booking = $_SESSION['booking'];
        $booking['start_date'] = $start_date;
        $booking['end_date'] = $end_date;
        $booking['nb_of_travellers'] = $nb_of_travellers;
        $_SESSION['booking'] = $booking;
        header('location: ./?action=booking3');
    }
    else
    {
        echo 'problème date';
        print_r($_POST);
    }
}
?>