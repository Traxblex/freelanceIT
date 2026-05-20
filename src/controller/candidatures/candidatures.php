<?php
require_once 'src/model/bdd.php';
function getCandidatures() {
    $bdd = getBDD();
    $stmt = $bdd->prepare("SELECT nom, prenom, email, cv FROM candidatures");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$candidatures = getCandidatures();
?>