<?php
require_once 'src/model/bdd.php';

$erreur = null; // Variable pour stocker un éventuel message d'erreur

// Si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    /// 1. On prépare la requête proprement pour éviter le renvoi d'un booléen (false)
    $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    
    // 2. Maintenant on peut faire le fetch() en toute sécurité
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 3. On vérifie tout : que l'user existe, qu'il a un MDP et qu'il correspond
    if ($user && !empty($user['mot_de_passe']) && password_verify($password, $user['mot_de_passe'])) {
        // ... (ton code pour remplir la $_SESSION)
        
        // On remplit la session avec les infos utiles
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role']; // 'client' ou 'freelance'

        // On redirige vers le tableau de bord
        header("Location: index.php?page=dashboard");
        exit(); // Fin de l'exécution
        
    } else {
        $erreur = "Email ou mot de passe incorrect.";
    }
}
?>