<!-- views/details_travels.php -->

<h2><?php echo $result['title'] ?></h2>

<img src="./images/<?php echo $result['large_image'] ?>" alt="image" />
<p><?php echo $result['large_texte'] ?></p>
<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.be/maps?q=<?php echo $result['latitude']?>,<?php echo $result['longitude']?>&hl=fr&num=1&vpsrc=0&t=m&z=16&output=embed"></iframe>
<a href="./?action=list_hotels&id_travel=<?php echo $result['id'] ?>">Hotels diponibles pour ce voyage</a>
<a href="javascript:history.back();">Retour à la liste de voyages</a>