<?php
// admin/process/connexion.php
// GET : /?action=connexion

if(empty($_POST)){
    $error = "";
    include('./views/'.$action.'.php');
}

// POST ************************************************************************
else{
    //traitement du post    
    $email = trim(htmlspecialchars($_POST['email']));
    $password = md5(trim(htmlspecialchars($_POST['password'])));
    
    $request = 'SELECT * FROM users WHERE email = :email AND password = :password';
    $query = Connexion::openDb()->prepare($request);
    $query->execute(array('email' => $email, 'password' => $password));
    $count = $query->rowCount();
    if($count == 1)
    {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('location: ./');
    }
    else
    {
        $error = "Aucun utilisateur ne correspond à ce couple emial / password";
        include('./views/'.$action.'.php');
    }
}
?>