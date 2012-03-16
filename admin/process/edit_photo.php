<?php
// admin/process/edit_photo.php
// GET : /?action=edit_photo&id=5&cat=hotels&type=small

if(empty($_FILES)){
    if(!empty($_GET['id']) && !empty($_GET['type']) && !empty($_GET['cat'])){
        $id = trim(htmlspecialchars($_GET['id']));
        $table = trim(htmlspecialchars($_GET['cat']));
        $type= trim(htmlspecialchars($_GET['type']));
        
        $request = 'SELECT '.$type.'_image AS image FROM '.$table.' WHERE id = :id';
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
    //traitement du $_FILES   
    $id = trim(htmlspecialchars($_GET['id']));
    $table = trim(htmlspecialchars($_GET['cat']));
    $type= trim(htmlspecialchars($_GET['type']));
    // upload nlle photo
    include('./functions/uploadPhoto.php');
    $image = uploadPhoto($_FILES['image']);
    //supprimer l'ancienne photo
    $request = 'SELECT '.$type.'_image AS image FROM '.$table.' WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('id' => $id));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    unlink('../images/'.$result[$type.'_image']);
    
    $request = 'UPDATE '.$table.' SET '.$type.'_image = :image WHERE id = :id';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('image' => $image, 'id' => $id));
    
    header('location: ./?action=list_'.$table);
}
?>