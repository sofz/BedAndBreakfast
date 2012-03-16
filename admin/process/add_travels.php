<?php
// admin/process/add_travels.php
// GET : /?action=add_travels


if(empty($_POST)){
    //liste des catégories
    $request = 'SELECT * FROM categories';
    $query = Connexion::openDb()->query($request);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    //traitement du post
    $title = trim(htmlspecialchars($_POST['title']));
    $small_texte = trim(htmlspecialchars($_POST['small_texte']));
    $large_texte = trim(htmlspecialchars($_POST['large_texte']));
    $latitude = trim(htmlspecialchars($_POST['latitude']));
    $longitude = trim(htmlspecialchars($_POST['longitude']));
    // upload 2 fichiers photo
    include('./functions/uploadPhoto.php');
    $small_image = uploadPhoto($_FILES['small_image']);
    $large_image = uploadPhoto($_FILES['large_image']);
    
    $request = 'INSERT INTO travels (title, small_texte, large_texte, latitude, longitude, small_image, large_image) VALUES (:title, :small_texte, :large_texte, :latitude, :longitude, :small_image, :large_image)';
    $db = Connexion::openDb();
    $query = $db->prepare($request);
    $query->execute(array('title' => $title, 'small_texte' => $small_texte, 'large_texte' => $large_texte, 'latitude' => $latitude, 'longitude' => $longitude, 'small_image' => $small_image, 'large_image' => $large_image));
    
    //traitement des categories
    $id_travel = $db->lastInsertId(); // recup de l'ID du voyage
    foreach ($_POST['categories'] as $id_category => $value) {
            $request = 'INSERT INTO categories_travels (id_category, id_travel) VALUES (:id_category, :id_travel)';
            $query = $db->prepare($request);
            $query->execute(array('id_category' => $id_category, 'id_travel' => $id_travel));
    }
    
    header('location: ./?action=list_travels');
}

?>