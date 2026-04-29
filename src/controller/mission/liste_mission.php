<?php
require_once('src/model/bdd.php');

$req = $bdd->prepare("SELECT missions.*, entreprises.Nom_entreprise FROM missions INNER JOIN entreprises ON missions.id_entreprise = entreprises.id ORDER BY missions.date_creation DESC");
$req->execute();
$missions = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($missions as $key => $mission) {
    if (!empty($mission['competences_requises'])) {
        $missions[$key]['tags'] = explode(',', $mission['competences_requises']);
    } else {
        $missions[$key]['tags'] = [];
    }
$date_creation = new DateTime($mission['date_creation']);
$maintenant = new DateTime();
$difference = $maintenant->diff($date_creation);

if ($difference->d == 0) {
    $missions[$key]['temps_ecoule'] = "Aujourd'hui";
} elseif ($difference->d == 1) {
    $missions[$key]['temps_ecoule'] = "Hier";
} else {
    $missions[$key]['temps_ecoule'] = "Il y a " . $difference->d . " jours";
}
}
?>