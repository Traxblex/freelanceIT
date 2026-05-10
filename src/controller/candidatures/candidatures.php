<?php
require_once 'src/model/bdd.php';

// Si l'utilisateur n'est pas connecté, on le vire
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=connexion');
    exit();
}

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];
$candidatures = [];

// --- ACTION : LE CLIENT ACCEPTE OU REFUSE UNE CANDIDATURE ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['id_candidature']) && $user_role === 'client') {
    $nouveau_statut = ($_POST['action'] === 'accepter') ? 'Acceptée' : 'Refusée';
    $update = $bdd->prepare("UPDATE candidatures SET statut = ? WHERE id = ?");
    $update->execute([$nouveau_statut, $_POST['id_candidature']]);
    
    // On rafraîchit la page
    header("Location: index.php?page=candidatures");
    exit();
}

// --- RÉCUPÉRATION DES DONNÉES ---
if ($user_role === 'freelance') {
    // Le freelance voit SES candidatures
    $req = $bdd->prepare("
        SELECT c.*, m.titre AS titre_mission, e.nom_entreprise 
        FROM candidatures c
        JOIN missions m ON c.id_mission = m.id
        JOIN entreprises e ON m.id_entreprise = e.id
        WHERE c.id_utilisateur = ? 
        ORDER BY c.date_candidature DESC
    ");
    $req->execute([$user_id]);
    $candidatures = $req->fetchAll(PDO::FETCH_ASSOC);

} elseif ($user_role === 'client') {
    // Le client voit LES candidatures SUR SES MISSIONS
    $req = $bdd->prepare("
        SELECT c.*, m.titre AS titre_mission, u.prenom, u.nom, p.photo, p.titre_profil
        FROM candidatures c
        JOIN missions m ON c.id_mission = m.id
        JOIN entreprises e ON m.id_entreprise = e.id
        JOIN utilisateurs u ON c.id_utilisateur = u.id
        LEFT JOIN profils_freelances p ON u.id = p.id_utilisateur
        WHERE e.id_utilisateur = ?
        ORDER BY c.date_candidature DESC
    ");
    $req->execute([$user_id]);
    $candidatures = $req->fetchAll(PDO::FETCH_ASSOC);
}
?>