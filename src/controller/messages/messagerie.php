<?php
include(dirname(__DIR__, 2) . "/model/bdd.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?page=connexion");
    exit();
}

$id_user = $_SESSION['user_id'];

// Marquer un message comme lu
if (isset($_GET['lire'])) {
    $upd = $bdd->prepare("UPDATE messages SET lu = 1 WHERE id = ? AND id_destinataire = ?");
    $upd->execute([$_GET['lire'], $id_user]);
    header("Location: index.php?page=messagerie&message=" . $_GET['lire']);
    exit();
}

// Supprimer un message
if (isset($_GET['supprimer'])) {
    $del = $bdd->prepare("DELETE FROM messages WHERE id = ? AND id_destinataire = ?");
    $del->execute([$_GET['supprimer'], $id_user]);
    header("Location: index.php?page=messagerie");
    exit();
}

// Message ouvert
$message_ouvert = null;
if (isset($_GET['message'])) {
    $stmt = $bdd->prepare("
        SELECT m.*, u.nom, u.prenom, u.email, u.role
        FROM messages m
        JOIN utilisateurs u ON u.id = m.id_expediteur
        WHERE m.id = ? AND m.id_destinataire = ?
    ");
    $stmt->execute([$_GET['message'], $id_user]);
    $message_ouvert = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Liste des messages reçus
$stmt = $bdd->prepare("
    SELECT m.id, m.sujet, m.date_envoi, m.lu,
           u.nom, u.prenom, u.role
    FROM messages m
    JOIN utilisateurs u ON u.id = m.id_expediteur
    WHERE m.id_destinataire = ?
    ORDER BY m.date_envoi DESC
");
$stmt->execute([$id_user]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Compter non lus
$nb_non_lus = count(array_filter($messages, fn($m) => $m['lu'] == 0));
?>
