<?php
include(dirname(__DIR__, 2) . "/model/bdd.php");

$message_succes = null;
$message_erreur = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'freelance') {

        $proposition      = $_POST['proposition'] ?? '';
        $tarif            = $_POST['tarif'] ?? '';
        $delai            = $_POST['delai'] ?? '';
        $id_mission       = $_POST['id_mission'] ?? null;
        $date_postulation = date('Y-m-d');

        if (!$id_mission) {
            header("Location: index.php?page=mission&erreur=nomission");
            exit();
        }

        // Récupérer l'id du profil freelance (≠ id utilisateur)
        $stmtFreelance = $bdd->prepare("SELECT id FROM profils_freelances WHERE id_utilisateur = ?");
        $stmtFreelance->execute([$_SESSION['user_id']]);
        $freelance = $stmtFreelance->fetch(PDO::FETCH_ASSOC);

        if (!$freelance) {
            header("Location: index.php?page=detailMission&id=" . $id_mission . "&erreur=noprofil");
            exit();
        }

        $id_freelance = $freelance['id'];

        // Vérifier si déjà candidaté
        $verif = $bdd->prepare("SELECT id FROM candidatures WHERE id_mission = ? AND id_freelance = ?");
        $verif->execute([$id_mission, $id_freelance]);

        if ($verif->fetch()) {
            header("Location: index.php?page=detailMission&id=" . $id_mission . "&erreur=doublon");
            exit();
        }

        $insert = $bdd->prepare("INSERT INTO candidatures (id_mission, id_freelance, proposition, tarif_propose, delai_livraison, statut, date_postulation) VALUES (?, ?, ?, ?, ?, 'en_attente', ?)");
        $insert->execute([$id_mission, $id_freelance, $proposition, $tarif, $delai, $date_postulation]);

        header("Location: index.php?page=detailMission&id=" . $id_mission . "&succes=1");
        exit();

    } else {
        header("Location: index.php?page=connexion");
        exit();
    }
}
?>
