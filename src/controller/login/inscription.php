<?php
require_once 'src/model/bdd.php';

$message_erreur = null;
$message_succes = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role']; 
    $date_inscription = date('Y-m-d');

    if ($password !== $confirm_password) {
        $message_erreur = "Les mots de passe ne correspondent pas.";
    } else {
        $verif_email = $bdd->prepare("SELECT id FROM utilisateurs WHERE email = ?");
        $verif_email->execute([$email]);
        
        if ($verif_email->fetch()) {
            $message_erreur = "Cet email est déjà utilisé par un autre compte.";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $req = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, date_inscription) VALUES (:nom, :prenom, :email, :mot_de_passe, :role, :date_inscription)");
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':email', $email);
            $req->bindParam(':mot_de_passe', $hashed_password);
            $req->bindParam(':role', $role);
            $req->bindParam(':date_inscription', $date_inscription);

            if ($req->execute()) {
                $id_nouvel_utilisateur = $bdd->lastInsertId();

               if ($role === 'client') {
                    $siret = $_POST['siret'] ?? null;
                    $adresse = $_POST['adresse'] ?? null;
                    $description = $_POST['description'] ?? null;
                    $nom_entreprise = $_POST['entreprise'] ?? null;

                    $req_entreprise = $bdd->prepare("INSERT INTO entreprises (id_utilisateur, Nom_entreprise, siret, adresse, description) VALUES (?, ?, ?, ?, ?)");
                    $req_entreprise->execute([$id_nouvel_utilisateur, $nom_entreprise, $siret, $adresse, $description]);
                }
        

                header("Location: index.php?page=connexion&inscrit=1");
                exit();
            } else {
                $message_erreur = "Une erreur technique est survenue lors de l'inscription.";
            }
        }
    }
}
?>
