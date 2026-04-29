<?php
require_once 'src/model/bdd.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'freelance') {
    header('Location: index.php?page=dashboard');
    exit();
}

$user_id = $_SESSION['user_id'];
$message_succes = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre_profil = $_POST['titre_profil'] ?? '';
    $description = $_POST['description'] ?? '';
    $competences = $_POST['competences'] ?? '';
    $localisation = $_POST['localisation'] ?? '';
    $tarif_horaire = !empty($_POST['tarif_horaire']) ? (int)$_POST['tarif_horaire'] : null;
    $disponibilite = isset($_POST['disponibilite']) ? 1 : 0;
    $exp = !empty($_POST['exp']) ? (int)$_POST['exp'] : null;

    $req_check = $bdd->prepare("SELECT id FROM profils_freelances WHERE id_utilisateur = ?");
    $req_check->execute([$user_id]);
    $profil_existe = $req_check->fetch();

    if ($profil_existe) {
        $req = $bdd->prepare("UPDATE profils_freelances SET titre_profil = ?, description = ?, competences = ?, localisation = ?, tarif_horaire = ?, disponibilite = ?, exp = ? WHERE id_utilisateur = ?");
        $req->execute([$titre_profil, $description, $competences, $localisation, $tarif_horaire, $disponibilite, $exp, $user_id]);
    } else {
        $req = $bdd->prepare("INSERT INTO profils_freelances (id_utilisateur, titre_profil, description, competences, localisation, tarif_horaire, disponibilite, exp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute([$user_id, $titre_profil, $description, $competences, $localisation, $tarif_horaire, $disponibilite, $exp]);
    }

    $message_succes = "Ton profil a été mis à jour avec succès !";
}


$req_profil = $bdd->prepare("SELECT * FROM profils_freelances WHERE id_utilisateur = ?");
$req_profil->execute([$user_id]);
$profil = $req_profil->fetch(PDO::FETCH_ASSOC);

if (!$profil) {
    $profil = [
        'titre_profil' => '', 'description' => '', 'competences' => '', 
        'localisation' => '', 'tarif_horaire' => '', 'disponibilite' => 1, 'exp' => null
    ];
}
?>