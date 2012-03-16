<?php
// admin/process/delete_hotels.php
// GET : /?action=delete_hotels&id=5
// GET : /?action=delete_hotels

if(empty($_POST)){
    if(!empty($_GET['id'])){
        $id = trim(htmlspecialchars($_GET['id']));
        
        $request = 'SELECT * FROM hotels WHERE id = :id';
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
    
    //supprimer l'hotel
    $request = 'DELETE FROM hotels WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    
    header('location: ./?action=list_hotels');
}
?>
