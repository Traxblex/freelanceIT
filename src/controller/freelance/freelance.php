<?php
// On inclut la connexion à la BDD
require_once('src/model/bdd.php');

// On récupère les freelances avec leurs informations détaillées
$req = $bdd->prepare("
    SELECT u.nom, u.prenom, p.* FROM utilisateurs u 
    JOIN profils_freelances p ON u.id = p.id_utilisateur 
    WHERE u.role = 'freelance'
");
$req->execute();
$freelances = $req->fetchAll(PDO::FETCH_ASSOC);

// On prépare les compétences pour l'affichage des badges
foreach ($freelances as $key => $f) {
    $freelances[$key]['tags'] = !empty($f['competences']) ? explode(',', $f['competences']) : [];
}
?>