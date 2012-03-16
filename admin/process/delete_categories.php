<?php
// admin/process/delete_categories.php
// GET : /?action=delete_categories&id=5
// GET : /?action=delete_categories

if(empty($_POST)){
    if(!empty($_GET['id'])){
        $id = trim(htmlspecialchars($_GET['id']));
        
        $request = 'SELECT * FROM categories WHERE id = :id';
        $query = Connexion::openDb()->prepare($request);
        $query->execute(array('id' => $id));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        include('./views/'.$action.'.php');
    }
    else{
        header('location : ./');
    }
}

// POST ************************************************************************
else{
    //traitement du post    
    $id = trim(htmlspecialchars($_POST['id']));
    
    //supprimer la catégorie
    $request = 'DELETE FROM categories WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    
    header('location: ./?action=list_categories');
}
?>
