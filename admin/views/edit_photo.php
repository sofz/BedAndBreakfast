<!-- admin/views/edit_photo.php -->

<h2>Modifier 1 photo</h2>

<form method="POST" action="./?action=edit_photo&id=<?php echo $id ?>&cat=<?php echo $table ?>&type=<?php echo $type ?>" enctype="multipart/form-data">
    <fieldset>
        <label>Image actuelle :</label>
        <img src="../images/<?php echo $result['image']?>" alt="" />
        <label>Nouvelle image :</label>
        <input type="file" name="image" />
        <input type="submit" value="Modifier" />
    </fieldset>
</form>