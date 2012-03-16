<?php
// process/details_travels.php
// GET : /?action=details_travels&id=5

if(empty($_GET['id'])){
    header('location: ./');
}
else{
    $id = trim(htmlspecialchars($_GET['id']));
    
    //1 travel
    $request = 'SELECT * FROM travels WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    $result = $query->fetch(PDO::FETCH_ASSOC);
}

include('./views/'.$action.'.php');
?>
