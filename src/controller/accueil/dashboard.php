<?php
require_once 'src/model/bdd.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=connexion');
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['user_role'];

$req_user = $bdd->prepare("SELECT prenom FROM utilisateurs WHERE id = ?");
$req_user->execute([$user_id]);
$user = $req_user->fetch(PDO::FETCH_ASSOC);

$stats = [];

if ($role === 'client') {
    $req = $bdd->prepare("SELECT id, Nom_entreprise, SIRET, description, adresse FROM entreprises WHERE id_utilisateur = ?");
    $req->execute([$user_id]);
    $entreprise = $req->fetch(PDO::FETCH_ASSOC);

    if ($entreprise) {
        $req_count = $bdd->prepare("SELECT COUNT(*) as total FROM missions WHERE id_entreprise = ?");
        $req_count->execute([$entreprise['id']]);
        $stats['nb_missions'] = $req_count->fetch()['total'];
    }
} elseif ($role === 'freelance') {
    $req = $bdd->prepare("SELECT * FROM profils_freelances WHERE id_utilisateur = ?");
    $req->execute([$user_id]);
    $profil = $req->fetch(PDO::FETCH_ASSOC);
    
    $stats['disponibilite'] = $profil['disponibilite'] ?? 0;
    $stats['titre'] = $profil['titre_profil'] ?? 'Profil non complété';

    $req_count = $bdd->prepare("SELECT COUNT(*) as total FROM candidatures WHERE id_freelance = ?");
    $req_count->execute([$user_id]);
    $stats['nb_candidatures'] = $req_count->fetch()['total'];
}
?>