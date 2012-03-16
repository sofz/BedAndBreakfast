<!-- views/booking2.php -->

<h2>Réservation - Etape 2 sur 4 - Suite du processus de réservation</h2>
<?php //echo $error ?>
<form method="POST" action="./?action=booking2">
    <label>Nombre de personnes</label>
    <select name="nb_of_travellers">
        <?php for ($i = 1; $i <= 20; $i++) { ?>
        <option value="<?php echo $i?>"><?php echo $i?></option>
        <?php } ?>
    </select>
    <!-- TODO : datepicker -->
    <label>Date de départ</label>
    <input type="text" name="start_date" /> (format : yy-mm-dd)
    <label>Date de retour</label>
    <input type="text" name="end_date" /> (format : yy-mm-dd)
    <input type="submit" value ="étape 3 ->" />
</form>