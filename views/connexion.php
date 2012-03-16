<!-- admin/views/connexion.php -->

<h2>Connexion</h2>
<?php echo $error ?>
<form method="POST" action="./?action=connexion">
    <label>Email</label>
    <input type="test" name="email" />
    <label>Password</label>
    <input type="password" name="password" />
    <input type="submit" value ="connexion" />
</form>