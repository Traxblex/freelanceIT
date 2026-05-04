<?php
require_once 'src/model/bdd.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Vérifier si l'email existe dans la base de données
    $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $req->bindParam(':email', $email);
    $req->execute();
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Générer un token de réinitialisation
        $token = bin2hex(random_bytes(50));

        // Enregistrer le token dans la base de données (vous pouvez créer une table pour cela)
        $req = $bdd->prepare("INSERT INTO password_resets (email, token) VALUES (:email, :token)");
        $req->bindParam(':email', $email);
        $req->bindParam(':token', $token);
        $req->execute();

        // Envoyer un email avec le lien de réinitialisation (vous devez configurer votre serveur SMTP)
        $reset_link = "http://promosio.allamacamara.fr/index.php?page=reinitialiserMotDePasse&token=$token";
        mail($email, "Réinitialisation de mot de passe", "Cliquez sur ce lien pour réinitialiser votre mot de passe: $reset_link");

        echo "Un email de réinitialisation a été envoyé à votre adresse.";
    } else {
        echo "Aucun compte trouvé avec cette adresse email.";
    }
}