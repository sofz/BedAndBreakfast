<?php
// admin/process/edit_options.php
// GET : /?action=edit_options&id=5

if(empty($_POST)){
    if(!empty($_GET['id'])){
        $id = trim(htmlspecialchars($_GET['id']));
        
        $request = 'SELECT * FROM options WHERE id = :id';
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
    $name = trim(htmlspecialchars($_POST['name']));
    $id = trim(htmlspecialchars($_GET['id']));
    
    $request = 'UPDATE options SET name = :name WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('name' => $name, 'id' => $id));
    
    header('location: ./?action=list_options');
}
?>
