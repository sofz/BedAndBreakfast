<!-- views/booking3.php -->

<h2>Réservation - Etape 3 sur 4 - Choix du vol</h2>
<?php //echo $error ?>
<form method="POST" action="./?action=booking3">
    <label>Vols disponibles pour la destination</label><br />
    <?php foreach ($result as $flight) {?>
    <input type="radio" name="flight_id" value="<?php echo $flight['id']?>" /> Jour et heure de départ : <?php echo $flight['departure_datetime']?> 
    / Jour et heure d'arrivée : <?php echo $flight['arrival_datetime']?> 
    / Prix par personne : <?php echo $flight['rates']?> € <br />
    <?php } ?>
    <input type="submit" value ="étape 4 ->" />
</form>
