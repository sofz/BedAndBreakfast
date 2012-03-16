<!-- admin/views/list_travels.php -->

<h2>Gestion des voyages</h2>

<table>
    <th>
        <td>ID</td>
        <td>Title</td>
        <td></td>
        <td></td>
    </th>
    <?php foreach ($result as $travel) { ?>
    <tr>
        <td><?php echo $travel['id']?></td>
        <td><?php echo $travel['title']?></td>
        <td><a href="./?action=edit_travels&id=<?php echo $travel['id']?>">Edit</a></td>
        <td><a href="./?action=delete_travels&id=<?php echo $travel['id']?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<a href="./?action=add_travels">Ajouter 1 voyage</a>