<?php
require_once 'src/model/bdd.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php?page=mission');
    exit();
}


$id_freelance = (int) $_GET['id'];
$req = $bdd->prepare("
    SELECT u.nom, u.prenom, p.* FROM utilisateurs u 
    JOIN profils_freelances p ON u.id = p.id_utilisateur 
    WHERE u.role = 'freelance'
");
$req->execute();
$freelances = $req->fetchAll(PDO::FETCH_ASSOC);
foreach ($freelances as $key => $f) {
    $freelances[$key]['tags'] = !empty($f['competences']) ? explode(',', $f['competences']) : [];
}


$date_creation = new DateTime($freelance['date_creation']);
$maintenant = new DateTime();
$difference = $maintenant->diff($date_creation);
$req_coutcandidats = $bdd->prepare("SELECT COUNT(*) as total FROM candidatures WHERE id_mission = ?");
$req_coutcandidats->execute([$id_freelance]);
$stats['nb_candidats'] = $req_coutcandidats->fetch()['total'];

if (!$freelance) {
    header('Location: index.php?page=freelance');
    exit();
}
