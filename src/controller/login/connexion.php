<?php
require_once '../../model/bdd.php';
session_start(); // On démarre la session tout en haut

// On vérifie simplement si la requête est en POST (au lieu du isset)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les informations de connexion dans la base de données
    $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // On utilise bien password_verify pour comparer le mot de passe tapé avec le hash de la BDD
    if ($user && password_verify($password, $user['mot_de_passe'])) {
        // Connexion réussie, enregistrer les variables de session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        
        // Redirection avec le bon chemin vers la racine
        header("Location: http://localhost/Promo321/info/cours_info_shapeche/freelanceIT/index.php?page=index");
        exit();
    } else {
        // Connexion échouée
        echo "Email ou mot de passe incorrect.";
    }
}
?>