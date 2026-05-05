<?php
    include 'src/model/bdd.php';

    $req = $bdd->prepare("SELECT missions.*, entreprises.Nom_entreprise, profils_freelances.titre_profil, profils_freelances.description FROM missions INNER JOIN entreprises ON missions.id_entreprise = entreprises.id LEFT JOIN profils_freelances ON missions.id_entreprise = profils_freelances.id_utilisateur WHERE missions.id = ?");
    $req->execute([$_GET['id']]);
    $mission = $req->fetch(PDO::FETCH_ASSOC);

    foreach ($missions as $key => $mission) {
        if (!empty($mission['competences_requises'])) {
            $missions[$key]['tags'] = explode(',', $mission['competences_requises']);
        } else {
            $missions[$key]['tags'] = [];
        }
    }
    if ($mission) {
        if (!empty($mission['competences_requises'])) {
            $mission['tags'] = explode(',', $mission['competences_requises']);
        } else {
            $mission['tags'] = [];
        }
    } else {
        echo "Mission non trouvée.";
        exit();
    }

