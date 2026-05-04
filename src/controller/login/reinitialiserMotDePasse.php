<?php
require_once 'src/model/bdd.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        die("Les mots de passe ne correspondent pas.");
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Vérifier le token et récupérer l'email associé
    $req = $bdd->prepare("SELECT email FROM password_resets WHERE token = :token");
    $req->bindParam(':token', $token);
    $req->execute();
    $reset_request = $req->fetch(PDO::FETCH_ASSOC);

    if ($reset_request) {
        $email = $reset_request['email'];

        // Mettre à jour le mot de passe de l'utilisateur
        $req = $bdd->prepare("UPDATE utilisateurs SET mot_de_passe = :mot_de_passe WHERE email = :email");
        $req->bindParam(':mot_de_passe', $hashed_password);
        $req->bindParam(':email', $email);
        $req->execute();

        // Supprimer la demande de réinitialisation
        $req = $bdd->prepare("DELETE FROM password_resets WHERE token = :token");
        $req->bindParam(':token', $token);
        $req->execute();

        echo "Votre mot de passe a été réinitialisé avec succès.";
    } else {
        echo "Token de réinitialisation invalide.";
    }
}