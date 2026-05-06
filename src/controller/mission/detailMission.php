<?php
require_once 'src/model/bdd.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php?page=mission');
    exit();
}


$id_mission = (int) $_GET['id'];
$req = $bdd->prepare("SELECT missions.*, entreprises.nom_entreprise, entreprises.description AS description_entreprise FROM missions JOIN entreprises ON missions.id_entreprise = entreprises.id WHERE missions.id = ?");
$req->execute([$id_mission]);
$mission = $req->fetch(PDO::FETCH_ASSOC);

$date_creation = new DateTime($mission['date_creation']);
$maintenant = new DateTime();
$difference = $maintenant->diff($date_creation);

if ($difference->d == 0) {
    $mission['temps_ecoule'] = "Aujourd'hui";
} elseif ($difference->d == 1) {
    $mission['temps_ecoule'] = "Hier";
} else {
    $mission['temps_ecoule'] = "Il y a " . $difference->d . " jours";
}

if (!$mission) {
    header('Location: index.php?page=mission');
    exit();
}