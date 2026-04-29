<?php
    require_once "src/model/bdd.php";
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=connexion");
        exit();
    }
    $user_id = $_SESSION['user_id'];
    $stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user['role'] === 'client') {
        $stmt = $bdd->prepare("SELECT * FROM entreprises WHERE id_utilisateur = ?");
        $stmt->execute([$user_id]);
        $profile = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $profile = null;
    }
