<!-- admin/views/list_categories.php -->

<h2>Gestion des catégories</h2>

<table>
    <th>
        <td>ID</td>
        <td>Name</td>
        <td></td>
        <td></td>
    </th>
    <?php foreach ($result as $category) { ?>
    <tr>
        <td><?php echo $category['id']?></td>
        <td><?php echo $category['name']?></td>
        <td><a href="./?action=edit_categories&id=<?php echo $category['id']?>">Edit</a></td>
        <td><a href="./?action=delete_categories&id=<?php echo $category['id']?>">Delete</a></td>
    </tr>
    <?php } ?>
</table>

<a href="./?action=add_categories">Ajouter 1 catégorie</a>