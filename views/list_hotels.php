<!-- views/list_hotels.php -->

<h2><?php echo $title ?></h2>

<?php foreach ($result as $hotel) { ?>

<div class="element_liste">
    <img src="./images/<?php echo $hotel['image'] ?>" alt="image" />
    <h3><?php echo $hotel['name'] ?></h3>
    <a href="./?action=details_hotels&id=<?php echo $hotel['id'] ?>">(En savoir plus)</a>
    <p><?php echo $hotel['texte'] ?></p>
</div>

<?php } ?>

<!-- TODO : page avec carte -->
<a href="#">Afficher ces hotels sur une carte</a>
