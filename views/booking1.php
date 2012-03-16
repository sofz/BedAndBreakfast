<!-- views/inscription.php -->

<h2>Réservation - Etape 1 sur 4 - Confirmez vos données</h2>
<?php echo $error ?>
<form method="POST" action="./?action=booking1">
    <label>Email : <?php echo $result['email']?></label>
    
    <label>Adresse*</label>
    <input type="text" name="adress" value="<?php echo $result['adress']?>"/>
    <label>Code postal*</label>
    <input type="text" name="zip_code" value="<?php echo $result['zip_code']?>"/>
    <label>Ville*</label>
    <input type="text" name="city" value="<?php echo $result['city']?>"/>
    <label>Pays*</label>
    <input type="text" name="country" value="<?php echo $result['country']?>"/>
    <label>Téléphone*</label>
    <input type="text" name="phone" value="<?php echo $result['phone']?>"/>
    <label>Date de naissance*</label>
    <input type="text" name="birthdate" value="<?php echo $result['birthdate']?>"/>
        
    <input type="submit" value ="étape 2 ->" />
</form>