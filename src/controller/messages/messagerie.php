<?php
include(dirname(__DIR__, 2) . "/model/bdd.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=connexion");
    exit();
}

$id_user = $_SESSION['user_id'];

if (isset($_GET['lire'])) {
    $upd = $bdd->prepare("UPDATE messages SET lu = 1 WHERE id = ? AND id_destinataire = ?");
    $upd->execute([$_GET['lire'], $id_user]);
    header("Location: index.php?page=messagerie&message=" . $_GET['lire']);
    exit();
}

if (isset($_GET['supprimer'])) {
    $del = $bdd->prepare("DELETE FROM messages WHERE id = ? AND id_destinataire = ?");
    $del->execute([$_GET['supprimer'], $id_user]);
    header("Location: index.php?page=messagerie");
    exit();
}


$message_ouvert = null;
if (isset($_GET['message'])) {
    $req = $bdd->prepare("
        SELECT m.*, u.nom, u.prenom, u.email, u.role
        FROM messages m
        JOIN utilisateurs u ON u.id = m.id_expediteur
        WHERE m.id = ? AND m.id_destinataire = ?
    ");
    $req->execute([$_GET['message'], $id_user]);
    $message_ouvert = $req->fetch(PDO::FETCH_ASSOC);
}

$req = $bdd->prepare("
    SELECT m.id, m.sujet, m.date_envoi, m.lu,
           u.nom, u.prenom, u.role
    FROM messages m
    JOIN utilisateurs u ON u.id = m.id_expediteur
    WHERE m.id_destinataire = ?
    ORDER BY m.date_envoi DESC
");
$req->execute([$id_user]);
$messages = $req->fetchAll(PDO::FETCH_ASSOC);

$nb_non_lus = count(array_filter($messages, fn($m) => $m['lu'] == 0));
?>
