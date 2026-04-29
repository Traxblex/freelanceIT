<?php
require_once 'src/model/bdd.php';

$erreur = null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

   
    $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $req->execute(['email' => $email]);
    
    
    $user = $req->fetch(PDO::FETCH_ASSOC);

    
    if ($user && !empty($user['mot_de_passe']) && password_verify($password, $user['mot_de_passe'])) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role']; 

       
        header("Location: index.php?page=dashboard");
        exit();
        
    } else {
        $erreur = "Email ou mot de passe incorrect.";
    }
}
?>