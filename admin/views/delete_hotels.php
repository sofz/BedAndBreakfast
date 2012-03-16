<!-- admin/views/edit_hotels.php -->

<h2>Supprimer 1 hotel</h2>

<form method="POST" action="./?action=delete_hotels">
    <fieldset>
        <label>Name : <?php echo $result['name'] ?></label><br />
        <label>Description : <?php echo $result['small_texte'] ?></label><br />
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>"/>
        <input type="submit" value="Supprimer" />
    </fieldset>
</form>