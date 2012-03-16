<!-- admin/views/edit_travels.php -->

<h2>Supprimer 1 voyage</h2>

<form method="POST" action="./?action=delete_travels">
    <fieldset>
        <label>Name : <?php echo $result['title'] ?></label><br />
        <label>Description : <?php echo $result['small_texte'] ?></label><br />
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>"/>
        <input type="submit" value="Supprimer" />
    </fieldset>
</form>