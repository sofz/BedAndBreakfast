<!-- views/list_travels.php -->

<h2><?php echo $title ?></h2>

<?php foreach ($result as $travel) { ?>

<div class="element_liste">
    <img src="./images/<?php echo $travel['image'] ?>" alt="image" />
    <h3><?php echo $travel['title'] ?></h3>
    <a href="./?action=details_travels&id=<?php echo $travel['id'] ?>">(En savoir plus)</a>
    <p><?php echo $travel['texte'] ?></p>
</div>

<?php } ?>
