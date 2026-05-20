<?php
include(dirname(__DIR__, 2) . "/model/bdd.php");

$candidatures = [];
$role = $_SESSION['user_role'] ?? null;
$id_user = $_SESSION['user_id'] ?? null;

if (!$id_user) {
    header("Location: index.php?page=connexion");
    exit();
}

if ($role === 'freelance') {
    // Le freelance voit ses propres candidatures
    $stmt = $bdd->prepare("
        SELECT c.id, c.proposition, c.tarif_propose, c.delai_livraison, c.statut, c.date_postulation,
               m.titre AS titre_mission, m.budget,
               e.Nom_entreprise AS nom_entreprise
        FROM candidatures c
        JOIN missions m ON c.id_mission = m.id
        JOIN entreprises e ON m.id_entreprise = e.id
        JOIN profils_freelances pf ON c.id_freelance = pf.id
        WHERE pf.id_utilisateur = ?
        ORDER BY c.date_postulation DESC
    ");
    $stmt->execute([$id_user]);
    $candidatures = $stmt->fetchAll(PDO::FETCH_ASSOC);

} elseif ($role === 'client') {
    // Le client voit les candidatures reçues sur ses missions
    $stmt = $bdd->prepare("
        SELECT c.id, c.proposition, c.tarif_propose, c.delai_livraison, c.statut, c.date_postulation,
               m.titre AS titre_mission, m.id AS id_mission,
               u.nom, u.prenom, u.email,
               pf.titre_profil, pf.competences, pf.tarif_horaire
        FROM candidatures c
        JOIN missions m ON c.id_mission = m.id
        JOIN entreprises e ON m.id_entreprise = e.id
        JOIN profils_freelances pf ON c.id_freelance = pf.id
        JOIN utilisateurs u ON pf.id_utilisateur = u.id
        WHERE e.id_utilisateur = ?
        ORDER BY c.date_postulation DESC
    ");
    $stmt->execute([$id_user]);
    $candidatures = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Traitement accept/refus (client uniquement)
if ($role === 'client' && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['id_candidature'])) {
    $nouveau_statut = $_POST['action'] === 'accepter' ? 'acceptee' : 'refusee';
    $upd = $bdd->prepare("UPDATE candidatures SET statut = ? WHERE id = ?");
    $upd->execute([$nouveau_statut, $_POST['id_candidature']]);
    header("Location: index.php?page=candidatures&action=" . $_POST['action']);
    exit();
}
?>
