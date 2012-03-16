<?php
// process/list_travels.php
// GET : /?action=list_travels
// GET : /?action=list_travels&id_category=5

// TODO : pagination

if(empty($_GET['id_category'])){
    //name category
    $title = "Liste des 5 derniers voyages ajoutés";
    //selected travels
    $request = 'SELECT t.id AS id, t.small_image AS image, t.title AS title, t.small_texte AS texte FROM travels t ORDER BY creation_date DESC LIMIT 0,5';
    $query = Connexion::openDb()->prepare($request);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $id = trim(htmlspecialchars($_GET['id_category']));
    // name category
    $request = 'SELECT * FROM categories WHERE id = :id_category';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id_category' => $id));
    $result = $query->fetch();
    $title = $result['name'];
    
    //all travels
    $request = 'SELECT t.id AS id, t.small_image AS image, t.title AS title, t.small_texte AS texte FROM travels t, categories c, categories_travels ct WHERE ct.id_category = :id_category AND t.id = ct.id_travel AND c.id = ct.id_category';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id_category' => $id));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

include('./views/'.$action.'.php');
?>
