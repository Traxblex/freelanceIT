<?php
require_once 'src/model/bdd.php';

// Sécurité : on vérifie que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=connexion');
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['user_role'];
$stats = [];

if ($role === 'client') {
    // 1. On récupère l'ID de l'entreprise
    $stmt = $bdd->prepare("SELECT id FROM entreprises WHERE id_utilisateur = ?");
    $stmt->execute([$user_id]);
    $entreprise = $stmt->fetch();

    if ($entreprise) {
        // 2. On compte le nombre de missions postées par cette entreprise
        $stmt_count = $bdd->prepare("SELECT COUNT(*) as total FROM missions WHERE id_entreprise = ?");
        $stmt_count->execute([$entreprise['id']]);
        $stats['nb_missions'] = $stmt_count->fetch()['total'];
    }
} elseif ($role === 'freelance') {
    // 1. On récupère les infos du profil freelance
    $stmt = $bdd->prepare("SELECT * FROM profils_freelances WHERE id_utilisateur = ?");
    $stmt->execute([$user_id]);
    $profil = $stmt->fetch();
    
    $stats['disponibilite'] = $profil['disponibilite'] ?? 0;
    $stats['titre'] = $profil['titre_profil'] ?? 'Profil non complété';
}
?>