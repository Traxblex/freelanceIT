<?php
include('../../model/bdd.php'); // [cite: 18]
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION['user_role'] === 'client') {
    
    // 1. Trouver l'ID de l'entreprise lié à cet utilisateur
    $stmt = $bdd->prepare("SELECT id FROM entreprises WHERE id_utilisateur = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $entreprise = $stmt->fetch();

    if ($entreprise) {
        $id_ent = $entreprise['id'];
        
        // 2. Insertion de la mission avec le bon id_entreprise
        $req = $bdd->prepare("INSERT INTO missions (id_entreprise, titre, description, competences_requises, budget, duree, date_creation) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
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