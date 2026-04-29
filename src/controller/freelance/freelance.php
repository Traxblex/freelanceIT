<?php
require_once('src/model/bdd.php');

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
?>