<?php
// admin/process/add_options.php
// GET : /?action=add_options


if(empty($_POST)){
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    //traitement du post    
    $name = trim(htmlspecialchars($_POST['name']));
    
    $request = 'INSERT INTO options (name) VALUES (:name)';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('name' => $name));
    
    header('location: ./?action=list_options');
}

?>
