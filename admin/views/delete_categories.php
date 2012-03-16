<!-- admin/views/edit_categories.php -->

<h2>Supprimer 1 catégorie</h2>

<form method="POST" action="./?action=delete_categories">
    <fieldset>
        <label>Name : <?php echo $result['name'] ?></label>
        <input type="hidden" name="id" value="<?php echo $result['id'] ?>"/>
        <input type="submit" value="Supprimer" />
    </fieldset>
</form>