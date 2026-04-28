<?php
// Pas besoin de session_start() ici car le routeur racine (index.php) l'a déjà fait !

// 1. On vide toutes les variables de session
$_SESSION = [];

// 2. On détruit la session côté serveur
session_destroy();

// 3. On redirige vers l'accueil
header("Location: index.php?page=accueil");
exit();
?>