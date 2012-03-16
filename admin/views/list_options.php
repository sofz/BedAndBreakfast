<!-- admin/views/list_options.php -->

<h2>Gestion des options des hotels</h2>

<table>
    <th>
        <td>ID</td>
        <td>Name</td>
        <td></td>
        <td></td>
    </th>
    <?php foreach ($result as $option) { ?>
    <tr>
        <td><?php echo $option['id']?></td>
        <td><?php echo $option['name']?></td>
        <td><a href="./?action=edit_options&id=<?php echo $option['id']?>">Edit</a></td>
        <td><a href="./?action=delete_options&id=<?php echo $option['id']?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<a href="./?action=add_options">Ajouter 1 option</a>