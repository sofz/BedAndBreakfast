<!-- admin/views/list_hotels.php -->

<h2>Gestion des hotels</h2>

<table>
    <th>
        <td>ID</td>
        <td>Name</td>
        <td></td>
        <td></td>
    </th>
    <?php foreach ($result as $hotel) { ?>
    <tr>
        <td><?php echo $hotel['id']?></td>
        <td><?php echo $hotel['name']?></td>
        <td><a href="./?action=edit_hotels&id=<?php echo $hotel['id']?>">Edit</a></td>
        <td><a href="./?action=delete_hotels&id=<?php echo $hotel['id']?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<a href="./?action=add_hotels">Ajouter 1 hotel</a>
<a href="./?action=list_options">Gérer les options</a>