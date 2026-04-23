<?php
    include('src/model/bdd.php');


$req = $bdd->prepare("
    SELECT u.nom, u.prenom, pf.* FROM utilisateurs u
    INNER JOIN profils_freelances pf ON u.id = pf.id_utilisateur
    WHERE u.role = 'freelance' AND pf.disponibilite = 1
");
$req->execute();
$freelances = $req->fetchAll(PDO::FETCH_ASSOC);

// On transforme le texte des compétences en tableau, comme pour les missions
foreach ($freelances as $key => $freelance) {
    if (!empty($freelance['competences'])) {
        $freelances[$key]['tableau_competences'] = explode(',', $freelance['competences']);
    } else {
        $freelances[$key]['tableau_competences'] = [];
    }
}
?>