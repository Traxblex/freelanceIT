<?php
    require_once '../../model/bdd.php';

    if(isset($_POST['connexion'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Vérifier les informations de connexion dans la base de données
        $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            // Connexion réussie, démarrer une session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            header("Location:index.php?page=index");
            exit();
        } else {
            // Connexion échouée, afficher un message d'erreur
            echo "Email ou mot de passe incorrect.";
        }
    }