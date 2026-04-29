<?php
    require_once 'src/model/bdd.php';

    
    $req = $bdd->query("SELECT COUNT(*) AS total FROM utilisateurs");
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $total_utilisateurs = $result['total'];
    $req = $bdd->query("SELECT COUNT(*) AS total FROM missions");
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $total_missions = $result['total'];
    $req = $bdd->query("SELECT COUNT(*) AS total FROM entreprises");
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $total_entreprises = $result['total'];
    $req = $bdd->query("SELECT COUNT(*) AS total FROM utilisateurs WHERE role = 'freelance'");
    $result = $req->fetch(PDO::FETCH_ASSOC);
    $total_freelances = $result['total'];
?>