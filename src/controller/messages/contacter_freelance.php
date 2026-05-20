<?php
include(dirname(__DIR__, 2) . "/model/bdd.php");

// Protection : doit être connecté en tant que client
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'client') {
    header("Location: index.php?page=connexion");
    exit();
}

$id_freelance_user = $_GET['id'] ?? null; // id dans la table utilisateurs
$message_succes = null;
$message_erreur = null;
$freelance = null;

if (!$id_freelance_user) {
    header("Location: index.php?page=freelance");
    exit();
}

// Récupérer les infos du freelance
$stmt = $bdd->prepare("
    SELECT u.id, u.nom, u.prenom, u.email,
           pf.titre_profil, pf.competences, pf.tarif_horaire, pf.localisation, pf.photo
    FROM utilisateurs u
    JOIN profils_freelances pf ON pf.id_utilisateur = u.id
    WHERE u.id = ? AND u.role = 'freelance'
");
$stmt->execute([$id_freelance_user]);
$freelance = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$freelance) {
    header("Location: index.php?page=freelance");
    exit();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sujet   = trim($_POST['sujet'] ?? '');
    $contenu = trim($_POST['contenu'] ?? '');

    if (empty($sujet) || empty($contenu)) {
        $message_erreur = "Veuillez remplir tous les champs.";
    } else {
        $insert = $bdd->prepare("
            INSERT INTO messages (id_expediteur, id_destinataire, sujet, contenu)
            VALUES (?, ?, ?, ?)
        ");
        $insert->execute([
            $_SESSION['user_id'],
            $id_freelance_user,
            $sujet,
            $contenu
        ]);
        $message_succes = "Votre message a été envoyé avec succès !";
    }
}
?>
