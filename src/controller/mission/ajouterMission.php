<?php
include('../../model/bdd.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['user_role'] === 'client') {
    $req = $bdd->prepare("SELECT id FROM entreprises WHERE id_utilisateur = ?");
    $req->execute([$_SESSION['user_id']]);
    $entreprise = $req->fetch();

    if ($entreprise) {
        $id_ent = $entreprise['id'];
        $req = $bdd->prepare("INSERT INTO missions (id_entreprise, titre, description, competences_requises, budget, duree, date_creation) VALUES (?, ?, ?, ?, ?, ?, NOW())");

        $req->execute([
            $id_ent, 
            $_POST['titre'], 
            $_POST['description'],
            $_POST['competences_requises'],
            $_POST['budget'], 
            $_POST['duree']
        ]);
        header('Location: http://localhost/Promo321/info/cours_info_shapeche/freelanceIT/index.php?page=mission');
    } else {
        echo "Erreur : Profil entreprise introuvable.";
    }
}