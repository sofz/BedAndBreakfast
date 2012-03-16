<!-- views/booking4.php -->

<h2>Réservation - Etape 4 sur 4 - Confirmation</h2>
<?php //echo $error ?>
<form method="POST" action="./?action=booking4">
    Votre réservation :
    <ul>
        <li>Nombre de voyageurs : <?php echo $_SESSION['booking']['hotel_id']?></li>
        <li>Date de départ : <?php echo $_SESSION['booking']['start_date']?></li>
        <li>Date de retour : <?php echo $_SESSION['booking']['end_date']?></li>
        <li>Hotel : <?php echo $hotel['name']?></li>
        <li>Vol : Jour et heure de départ : <?php echo $flight['departure_datetime']?> / Jour et heure d'arrivée : <?php echo $flight['arrival_datetime']?></li>
    </ul>
    Prix :
    <ul>
        <li>Hotel : <?php echo $_SESSION['booking']['nb_of_travellers'] ?> * <?php echo $hotel['rates'] ?>€ * <?php echo $nb_of_nights ?> = <?php echo $flight_price ?>€</li>
        <li>Vol : <?php echo $_SESSION['booking']['nb_of_travellers'] ?> * <?php echo $flight['rates'] ?>€ = <?php echo $flight_price ?>€</li>
        <li>Total du voyage : <?php echo $_SESSION['booking']['total_price'] ?>€</li>
    </ul>
    <input type="hidden" name="confirmation" value="ok" />
    <input type="submit" value ="Confirmer" />
</form>
<a href="./?action=#">Annuler</a>