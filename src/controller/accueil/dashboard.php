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
    $req = $bdd->prepare("SELECT id FROM entreprises WHERE id_utilisateur = ?");
    $req->execute([$user_id]);
    $entreprise = $req->fetch();

    if ($entreprise) {
        $req_count = $bdd->prepare("SELECT COUNT(*) as total FROM missions WHERE id_entreprise = ?");
        $req_count->execute([$entreprise['id']]);
        $stats['nb_missions'] = $req_count->fetch()['total'];
    }
} elseif ($role === 'freelance') {
    // 1. On récupère les infos du profil freelance
    $req = $bdd->prepare("SELECT * FROM profils_freelances WHERE id_utilisateur = ?");
    $req->execute([$user_id]);
    $profil = $req->fetch();
    
    $stats['disponibilite'] = $profil['disponibilite'] ?? 0;
    $stats['titre'] = $profil['titre_profil'] ?? 'Profil non complété';
}
?>