<!-- admin/views/edit_categories.php -->

<h2>Modifier 1 catégorie</h2>

<form method="POST" action="./?action=edit_categories&id=<?php echo $result['id'] ?>">
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $result['name'] ?>"/>
        <input type="submit" value="Modifier" />
    </fieldset>
</form>