<?php
require_once 'src/model/bdd.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'client') {
    header('Location: index.php?page=connexion');
    exit();
}

$user_id = $_SESSION['user_id'];
$message_succes = null;
$message_erreur = null;

// --- TRAITEMENT DU FORMULAIRE ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom        = trim($_POST['nom'] ?? '');
    $prenom     = trim($_POST['prenom'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $entreprise = trim($_POST['entreprise'] ?? '');
    $siret      = trim($_POST['siret'] ?? '');
    $adresse    = trim($_POST['adresse'] ?? '');
    $description= trim($_POST['description'] ?? '');

    // Validation basique
    if (empty($nom) || empty($prenom) || empty($email)) {
        $message_erreur = "Le nom, prénom et e-mail sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message_erreur = "L'adresse e-mail n'est pas valide.";
    } elseif (!empty($siret) && (strlen($siret) !== 14 || !ctype_digit($siret))) {
        $message_erreur = "Le numéro SIRET doit contenir exactement 14 chiffres.";
    } else {
        // Mise à jour utilisateurs
        $req = $bdd->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, email = ? WHERE id = ?");
        $req->execute([$nom, $prenom, $email, $user_id]);

        // Vérifie si une ligne entreprise existe déjà
        $req_check = $bdd->prepare("SELECT id FROM entreprises WHERE id_utilisateur = ?");
        $req_check->execute([$user_id]);
        $existe = $req_check->fetch();

        if ($existe) {
            $req_e = $bdd->prepare("UPDATE entreprises SET nom_entreprise = ?, siret = ?, adresse = ?, description = ? WHERE id_utilisateur = ?");
            $req_e->execute([$entreprise, $siret, $adresse, $description, $user_id]);
        } else {
            $req_e = $bdd->prepare("INSERT INTO entreprises (id_utilisateur, nom_entreprise, siret, adresse, description) VALUES (?, ?, ?, ?, ?)");
            $req_e->execute([$user_id, $entreprise, $siret, $adresse, $description]);
        }

        // Gestion de la photo de profil
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $extensions_ok = ['jpg', 'jpeg', 'png', 'webp'];
            $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

            if (in_array($ext, $extensions_ok)) {
                $dossier = 'public/uploads/';
                if (!is_dir($dossier)) mkdir($dossier, 0755, true);
                $nom_fichier = 'profil_' . $user_id . '_' . uniqid() . '.' . $ext;
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $nom_fichier)) {
                    $req_photo = $bdd->prepare("UPDATE utilisateurs SET photo = ? WHERE id = ?");
                    $req_photo->execute([$nom_fichier, $user_id]);
                }
            }
        }

        $_SESSION['user_nom'] = $prenom . ' ' . $nom;
        $message_succes = "Ton profil a été mis à jour avec succès !";
    }
}

// --- RÉCUPÉRATION DU PROFIL ---
$req_u = $bdd->prepare("
    SELECT u.id, u.nom, u.prenom, u.email, u.photo,
           e.nom_entreprise, e.siret, e.adresse, e.description
    FROM utilisateurs u
    LEFT JOIN entreprises e ON e.id_utilisateur = u.id
    WHERE u.id = ?
");
$req_u->execute([$user_id]);
$profil = $req_u->fetch(PDO::FETCH_ASSOC);

if (!$profil) {
    $profil = [
        'nom' => '', 'prenom' => '', 'email' => '', 'photo' => null,
        'nom_entreprise' => '', 'siret' => '', 'adresse' => '', 'description' => ''
    ];
}
?>
