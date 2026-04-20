<?php
require_once('src/model/bdd.php');

$req = $bdd->prepare("SELECT * FROM missions ORDER BY date_creation DESC");
$req->execute();
$missions = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($missions as $key => $mission) {
    if (!empty($mission['competences_requises'])) {
        $missions[$key]['tableau_competences'] = explode(',', $mission['competences_requises']);
    } else {
        $missions[$key]['tableau_competences'] = [];
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