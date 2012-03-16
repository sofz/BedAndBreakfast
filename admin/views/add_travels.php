<!-- admin/views/add_travels.php -->

<h2>Ajouter 1 voyage</h2>

<form method="POST" action="./?action=add_travels" enctype="multipart/form-data">
    <fieldset>
        <label>Title</label>
        <input type="text" name="title" /><br />
        <label>Small texte</label><br />
        <textarea name="small_texte"></textarea><br />
        <label>Large texte</label><br />
        <textarea name="large_texte"></textarea><br />
        <label>Latitude</label>
        <input type="text" name="latitude" /><br />
        <label>Longitude</label>
        <input type="text" name="longitude" /><br />
        <label>Catégories</label>        
        <table>
            <th>
                <td>ID</td>
                <td>Name</td>
                <td>Associer le voyage à la catégorie</td>
            </th>
            <?php foreach ($result as $category) { ?>
            <tr>
                <td><?php echo $category['id']?></td>
                <td><?php echo $category['name']?></td>
                <td><input type="checkbox" name="categories[<?php echo $category['id']?>]" value="<?php echo $category['id']?>" /></td>
            </tr>
            <?php } ?>
        </table>
        <input type="file" name="small_image" />
        <input type="file" name="large_image" />
        <input type="submit" value="Créer" />
    </fieldset>
</form>