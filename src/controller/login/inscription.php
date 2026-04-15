<?php

require_once '../../model/bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Vérifier que les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    // Hash du mot de passe
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insérer l'utilisateur dans la base de données
    $stmt = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role) VALUES (:nom, :prenom, :email, :mot_de_passe, :role)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $hashed_password);
    $stmt->bindParam(':role', $role);

    if ($stmt->execute()) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
        header("Location: index.php?page=connexion");
        exit();
    } else {
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
