<?php
require_once '../../model/bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role']; // "client" ou "freelance" selon ton formulaire
    $date_inscription = date('Y-m-d'); // OBLIGATOIRE POUR LA BDD

    // 1. Vérifier que les mots de passe correspondent
    if ($password !== $confirm_password) {
        die("Les mots de passe ne correspondent pas.");
    }

    // 2. Hash du mot de passe (DÉCOMMENTÉ)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 3. Insérer l'utilisateur avec la date d'inscription
    $stmt = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, date_inscription) VALUES (:nom, :prenom, :email, :mot_de_passe, :role, :date_inscription)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $hashed_password);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':date_inscription', $date_inscription);

    if ($stmt->execute()) {
        // 4. RÉSOLUTION DU PROBLÈME DE CLÉ ÉTRANGÈRE
        // On récupère l'ID de l'utilisateur qu'on vient juste de créer
        $id_nouvel_utilisateur = $bdd->lastInsertId();

        // On lui crée instantanément un profil lié selon son rôle
        if ($role === 'client') {
            $req_entreprise = $bdd->prepare("INSERT INTO entreprises (id_utilisateur, raison_sociale) VALUES (?, ?)");
            $req_entreprise->execute([$id_nouvel_utilisateur, "Entreprise de " . $nom]);
        } elseif ($role === 'freelance') {
            $req_dev = $bdd->prepare("INSERT INTO profils_dev (id_utilisateur, titre_profil) VALUES (?, ?)");
            $req_dev->execute([$id_nouvel_utilisateur, "Développeur (Profil à compléter)"]);
        }

        // 5. Redirection avec le BON chemin
        header("Location: ../../index.php?page=connexion");
        exit();
    } else {
        echo "Erreur lors de l'inscription. L'email est peut-être déjà utilisé.";
    }
}
?>