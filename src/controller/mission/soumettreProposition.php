<?php
include ("src/model/bdd.php");

$message_succes = null;
$message_erreur = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'freelance') {
        
        $proposition = $_POST['proposition'] ?? '';
        $tarif = $_POST['tarif'] ?? '';
        $delai = $_POST['delai'] ?? '';
        $id_utilisateur = $_SESSION['user_id'];
        $date_candidature = date('Y-m-d H:i:s');

        $verif = $bdd->prepare("SELECT id FROM candidatures WHERE id_mission = ? AND id_utilisateur = ?");
        $verif->execute([$id_mission, $id_utilisateur]);

        if ($verif->fetch()) {
            $message_erreur = "Tu as déjà envoyé une proposition pour cette mission !";
        } else {
            $insert = $bdd->prepare("INSERT INTO candidatures (id_mission, id_utilisateur, message, tarif_propose, delai, statut, date_candidature) VALUES (?, ?, ?, ?, ?, 'En attente', ?)");
            $insert->execute([$id_mission, $id_utilisateur, $proposition, $tarif, $delai, $date_candidature]);
            
            $message_succes = "Ta proposition a été envoyée avec succès au client !";
        }
    } else {
        $message_erreur = "Tu dois être connecté en tant que freelance pour postuler.";
    }
}
?>