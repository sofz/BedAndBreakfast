<!-- admin/views/edit_options.php -->

<h2>Modifier 1 option</h2>

<form method="POST" action="./?action=edit_options&id=<?php echo $result['id'] ?>">
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $result['name'] ?>"/>
        <input type="submit" value="Modifier" />
    </fieldset>
</form>