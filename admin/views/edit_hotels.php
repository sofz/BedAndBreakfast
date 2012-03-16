<!-- admin/views/edit_hotels.php -->

<h2>Modifier 1 hotel</h2>

<form method="POST" action="./?action=edit_hotels&id=<?php echo $result['id']?>">
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $result['name']?>" /><br />
        <label>Adresse</label>
        <input type="text" name="adress" value="<?php echo $result['adress']?>" />
        <label>Code postal</label>
        <input type="text" name="zip_code" value="<?php echo $result['zip_code']?>" />
        <label>Ville</label>
        <input type="text" name="city" value="<?php echo $result['city']?>" />
        <label>Pays</label>
        <input type="text" name="country" value="<?php echo $result['country']?>" />
        <label>Téléphone</label>
        <input type="text" name="phone" value="<?php echo $result['phone']?>" />
        <label>Prix par personne par nuit</label>
        <input type="text" name="rates" value="<?php echo $result['rates']?>" />
        <label>Small texte</label><br />
        <textarea name="small_texte"><?php echo $result['small_texte']?></textarea><br />
        <label>Large texte</label><br />
        <textarea name="large_texte"><?php echo $result['large_texte']?></textarea><br />
        <label>Latitude</label>
        <input type="text" name="latitude" value="<?php echo $result['latitude']?>" /><br />
        <label>Longitude</label>
        <input type="text" name="longitude" value="<?php echo $result['longitude']?>" /><br />
        <label>Nombre d'étoiles</label>
        <select name="stars"><br />
        <?php
            for($i = 1; $i <= 5; $i++){
                if($i == $result['stars']){
                    echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                }
                else{
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            }
        ?>
        </select>
        <label>Options</label>        
        <table>
            <th>
                <td>ID</td>
                <td>Name</td>
                <td>Oui</td>
                <td>Non</td>
                <td>NA</td>
            </th>
            <?php foreach ($options as $option) { $checked1 = ""; $checked2 = "";?>
            <tr>
                <td><?php echo $option['id']?></td>
                <td><?php echo $option['name']?></td>
                <?php if(array_key_exists($option['id'], $hotel_options)){
                    if($hotel_options[$option['id']] == "1"){
                        $checked1 = "checked=\"checked\"";
                    }
                    else{
                        $checked2 = "checked=\"checked\"";
                    }
                } ?>
                
                <td><input type="radio" name="options[<?php echo $option['id']?>]" value="1" <?php echo $checked1?> /></td>
                <td><input type="radio" name="options[<?php echo $option['id']?>]" value="0" <?php echo $checked2?> /></td>
                <td><input type="radio" name="options[<?php echo $option['id']?>]" value="2" /></td>
                
            </tr>
            <?php } ?>
        </table>
        <label>Associer au voyages :</label>        
        <table>
            <th>
                <td>ID</td>
                <td>Title</td>
                <td>associer</td>
            </th>
            <?php foreach ($travels as $travel) { ?>
            <tr>
                <td><?php echo $travel['id']?></td>
                <td><?php echo $travel['title']?></td>
                <?php if(in_array($travel['id'], $hotel_travels)){
                    $checked = "checked=\"checked\"";
                } 
                else{
                    $checked = "";
                } ?>
                <td><input type="checkbox" name="travels[<?php echo $travel['id']?>]" value="<?php echo $travel['id']?>" <?php echo $checked ?> /></td>
            <?php } ?>
        </table>
        <!-- TODO : upload images -->
        <input type="submit" value="Mettre à jour" />
    </fieldset>
</form>
<a href="./?action=edit_photo&id=<?php echo $result['id']?>&cat=hotels&type=small">Modifier la petite image</a>
<a href="./?action=edit_photo&id=<?php echo $result['id']?>&cat=hotels&type=large">Modifier la grande image</a>