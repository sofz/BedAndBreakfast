<?php
// admin/process/add_categories.php
// GET : /?action=add_categories


if(empty($_POST)){
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    //traitement du post    
    $name = trim(htmlspecialchars($_POST['name']));
    
    $request = 'INSERT INTO categories (name) VALUES (:name)';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('name' => $name));
    
    header('location: ./?action=list_categories');
}

?>
