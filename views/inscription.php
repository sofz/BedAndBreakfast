<!-- views/inscription.php -->

<h2>Inscription</h2>
<?php echo $error ?>
<form method="POST" action="./?action=inscription">
    <label>Email</label>
    <input type="test" name="email" />
    <label>Password</label>
    <input type="password" name="password" />
    
    <label>Adresse</label>
    <input type="text" name="adress" />
    <label>Code postal</label>
    <input type="text" name="zip_code" />
    <label>Ville</label>
    <input type="text" name="city" />
    <label>Pays</label>
    <input type="text" name="country" />
    <label>Téléphone</label>
    <input type="text" name="phone" />
    <label>Date de naissance</label>
    <input type="text" name="birthdate" />
        
    <input type="submit" value ="connexion" />
</form>