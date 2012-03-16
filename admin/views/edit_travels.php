<!-- admin/views/edit_travels.php -->

<h2>Mettre à jour 1 voyage</h2>

<form method="POST" action="./?action=edit_travels&id=<?php echo $result['id']?>">
    <fieldset>
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $result['title']?>"/><br />
        <label>Small texte</label><br />
        <textarea name="small_texte"><?php echo $result['small_texte']?></textarea><br />
        <label>Large texte</label><br />
        <textarea name="large_texte"><?php echo $result['large_texte']?></textarea><br />
        <label>Latitude</label>
        <input type="text" name="latitude" value="<?php echo $result['latitude']?>"/><br />
        <label>Longitude</label>
        <input type="text" name="longitude" value="<?php echo $result['longitude']?>"/><br />
        <label>Catégories</label>        
        <table>
            <th>
                <td>ID</td>
                <td>Name</td>
                <td>Associer le voyage à la catégorie</td>
            </th>
            <?php foreach ($all_categories as $category) { ?>
            <tr>
                <td><?php echo $category['id']?></td>
                <td><?php echo $category['name']?></td>
                <?php if(in_array($category['id'], $travel_categories)){
                    $checked = "checked=\"checked\"";
                } 
                else{
                    $checked = "";
                } ?>
                <td><input type="checkbox" name="categories[<?php echo $category['id']?>]" value="<?php echo $category['id']?>" <?php echo $checked ?> /></td>
            </tr>
            <?php } ?>
        </table>
        <!-- TODO : edit 2 images -->
        <input type="submit" value="Mettre à jour" />
    </fieldset>
</form>
<a href="./?action=edit_photo&id=<?php echo $result['id']?>&cat=travels&type=small">Modifier la petite image</a>
<a href="./?action=edit_photo&id=<?php echo $result['id']?>&cat=travels&type=large">Modifier la grande image</a>