<!-- admin/views/add_hotels.php -->

<h2>Ajouter 1 hotel</h2>

<form method="POST" action="./?action=add_hotels" enctype="multipart/form-data">
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" /><br />
        <label>Adresse</label>
        <input type="text" name="adress" />
        <label>Code postal</label>
        <input type="text" name="zip_code" />
        <label>Ville</label>
        <input type="text" name="city" />
        <label>Pays</label>
        <input type="text" name="country" />
        <label>Téléphone</label>
        <input type="text" name="phone" />
        <label>Prix par personne par nuit</label>
        <input type="text" name="rates" />
        <label>Small texte</label><br />
        <textarea name="small_texte"></textarea><br />
        <label>Large texte</label><br />
        <textarea name="large_texte"></textarea><br />
        <label>Latitude</label>
        <input type="text" name="latitude" /><br />
        <label>Longitude</label>
        <input type="text" name="longitude" /><br />
        <label>Nombre d'étoiles</label>
        <select name="start"><br />
        <?php
            for($i = 1; $i <= 5; $i++){
                echo '<option value="'.$i.'">'.$i.'</option>';
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
            <?php foreach ($options as $option) { ?>
            <tr>
                <td><?php echo $option['id']?></td>
                <td><?php echo $option['name']?></td>
                <td><input type="radio" name="options[<?php echo $option['id']?>]" value="1" /></td>
                <td><input type="radio" name="options[<?php echo $option['id']?>]" value="0" /></td>
                <td><input type="radio" name="options[<?php echo $option['id']?>]" value="2" /></td>
            </tr>
            <?php } ?>
        </table>
        <label>Associer aux voyages :</label>        
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
                <td><input type="checkbox" name="travels[<?php echo $travel['id']?>]" value="<?php echo $travel['id']?>" /></td>
            <?php } ?>
        </table>
        <input type="file" name="small_image" />
        <input type="file" name="large_image" />
        <input type="submit" value="Créer" />
    </fieldset>
</form>