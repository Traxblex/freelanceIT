<?php
include 'src/model/bdd.php';

$id_mission = (int) $_GET['id'];

// 2. Ta requête SELECT pour récupérer les infos de la mission...
$req = $bdd->prepare("SELECT m.*, e.nom_entreprise, e.description AS description_entreprise FROM missions m JOIN entreprises e ON m.id_entreprise = e.id WHERE m.id = ?");
$req->execute([$id_mission]);
$mission = $req->fetch(PDO::FETCH_ASSOC);

// 3. --- GESTION DE L'ENVOI DE LA CANDIDATURE (C'est ici qu'on colle la logique !) ---
$message_succes = null;
$message_erreur = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sécurité : on vérifie que c'est bien un freelance qui postule
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'freelance') {
        
        $proposition = $_POST['proposition'] ?? '';
        $tarif = $_POST['tarif'] ?? '';
        $delai = $_POST['delai'] ?? '';
        $id_utilisateur = $_SESSION['user_id'];
        $date_candidature = date('Y-m-d H:i:s');

        // On vérifie qu'il n'a pas déjà postulé à cette mission
        $verif = $bdd->prepare("SELECT id FROM candidatures WHERE id_mission = ? AND id_utilisateur = ?");
        $verif->execute([$id_mission, $id_utilisateur]);

        if ($verif->fetch()) {
            $message_erreur = "Tu as déjà envoyé une proposition pour cette mission !";
        } else {
            // On insère la candidature
            $insert = $bdd->prepare("INSERT INTO candidatures (id_mission, id_utilisateur, message, tarif_propose, delai, statut, date_candidature) VALUES (?, ?, ?, ?, ?, 'En attente', ?)");
            $insert->execute([$id_mission, $id_utilisateur, $proposition, $tarif, $delai, $date_candidature]);
            
            $message_succes = "Ta proposition a été envoyée avec succès au client !";
        }
    } else {
        $message_erreur = "Tu dois être connecté en tant que freelance pour postuler.";
    }
}
?>