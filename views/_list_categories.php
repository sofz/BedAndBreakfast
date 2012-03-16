<!-- views/list_categories.php -->

<ul>
<?php foreach ($result as $category) { ?>
    <li><a href="./?action=list_travels&id_category=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></li>
<?php } ?>
</ul>