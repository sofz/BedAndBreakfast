<!-- views/details_hotels.php -->

<h2><?php echo $result['name'] ?></h2>

<img src="./images/<?php echo $result['large_image'] ?>" alt="image" />
<p><?php echo $result['large_texte'] ?></p>

<!-- afficher les options -->
<div id="options">
    <ul>
        <li>Nombre d'étoiles : <?php echo $result['stars'] ?></li>
        <?php foreach ($options as $option) { ?>
        <li><?php echo $option['name'] ?> : <?php echo $option['valueoption'] ?></li>
        <?php } ?>
   </ul>
</div>

<!-- Google Map -->
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.be/maps?q=<?php echo $result['latitude']?>,<?php echo $result['longitude']?>&hl=fr&num=1&vpsrc=0&t=m&z=16&output=embed"></iframe>

<a href="./?action=booking1&id=<?php echo $result['id'] ?>">Réserver</a>
<a href="javascript:history.back();">Retour à la liste d'hotels</a>