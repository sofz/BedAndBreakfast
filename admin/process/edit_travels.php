<?php
// admin/process/edit_travels.php
// GET : /?action=edit_travels&id=5

if(empty($_POST)){
    if(!empty($_GET['id'])){
        $id = trim(htmlspecialchars($_GET['id']));
        
        $request = 'SELECT * FROM travels WHERE id = :id';
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('id' => $id));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        //liste des catégories
        $request = 'SELECT * FROM categories';
        $query = Connexion::openDb()->query($request);
        $all_categories = $query->fetchAll(PDO::FETCH_ASSOC);
        
        //liste des catégories du voyage
        $request = 'SELECT id_category AS id FROM categories_travels WHERE id_travel = :id';
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('id' => $id));
        $tmp_travel_categories = $query->fetchAll(PDO::FETCH_ASSOC);
        // pour utiliser la fonction in_array, il fait un array simple alors que le résultat de la query donne un array d'array
        $travel_categories = array();
        foreach ($tmp_travel_categories as $value) {
            $travel_categories[] = $value['id'];
        }
        
        include('./views/'.$action.'.php');
    }
    else{
        header('location : ./');
    }
}

// POST ************************************************************************
else{
    $id = trim(htmlspecialchars($_GET['id']));
    
    //traitement du post   
    $title = trim(htmlspecialchars($_POST['title']));
    $small_texte = trim(htmlspecialchars($_POST['small_texte']));
    $large_texte = trim(htmlspecialchars($_POST['large_texte']));
    $latitude = trim(htmlspecialchars($_POST['latitude']));
    $longitude = trim(htmlspecialchars($_POST['longitude']));
    // TODO : edit 2 fichiers photo
    
    
    $request = 'UPDATE travels SET title = :title, small_texte = :small_texte, large_texte = :large_texte, latitude = :latitude, longitude = :longitude WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('title' => $title, 'small_texte' => $small_texte, 'large_texte' => $large_texte, 'latitude' => $latitude, 'longitude' => $longitude, 'id' => $id));
    
    //traitement des categories
    //1 - supprimer les liens actuels
    $request = 'DELETE FROM categories_travels WHERE id_travel = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    //2 - recréer les liens sur base du POST
    foreach ($_POST['categories'] as $id_category => $value) {
            $request = 'INSERT INTO categories_travels (id_category, id_travel) VALUES (:id_category, :id_travel)';
            $query = Connexion::openDb()->prepare($request);
            $query->execute(array('id_category' => $id_category, 'id_travel' => $id));
    }
    
    header('location: ./?action=list_travels');
}
?>
