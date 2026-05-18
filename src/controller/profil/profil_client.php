<?php
require_once 'src/model/bdd.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'client') {
    header('Location: index.php?page=dashboard');
    exit();
}

$user_id = $_SESSION['user_id'];
$message_succes = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $entreprise = $_POST['entreprise'] ?? '';
    $siret = $_POST['siret'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $description = $_POST['description'] ?? '';
    
// On vérifie si le client a déjà un profil en base de données
    $req_check = $bdd->prepare("SELECT id FROM entreprises INNER JOIN utilisateurs ON entreprises.id_utilisateur = utilisateurs.id WHERE utilisateurs.id = ?");
    $req_check->execute([$user_id]);
    $profil_existe = $req_check->fetch();


    if ($profil_existe) {
        $req = $bdd->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, email = ? WHERE id = ?");
        $req->execute([$nom, $prenom, $email, $user_id]);
        $req_entreprise = $bdd->prepare("UPDATE entreprises SET nom_entreprise = ?, siret = ?, adresse = ?, description = ? WHERE id_utilisateur = ?");
        $req_entreprise->execute([$entreprise, $siret, $adresse, $description, $user_id]);
    } else {
        $req = $bdd->prepare("INSERT INTO utilisateurs (id, nom, prenom, email) VALUES (?, ?, ?, ?)");
        $req->execute([$user_id, $nom, $prenom, $email]);
        $req_entreprise = $bdd->prepare("INSERT INTO entreprises (id_utilisateur, nom_entreprise, siret, adresse, description) VALUES (?, ?, ?, ?, ?)");
        $req_entreprise->execute([$user_id, $entreprise, $siret, $adresse, $description]);
    }

    $message_succes = "Ton profil a été mis à jour avec succès !";
    
    if (isset($_FILES['image_profil']) && $_FILES['image_profil']['error'] === UPLOAD_ERR_OK) {
        
        $dossier_destination = 'public/uploads/'; 
        $nom_original = $_FILES['image_profil']['name'];
        $chemin_temporaire = $_FILES['image_profil']['tmp_name'];
        
        // Sécurité : on vérifie l'extension
        $extensions_autorisees = ['jpg', 'jpeg', 'png', 'webp'];
        $extension_fichier = strtolower(pathinfo($nom_original, PATHINFO_EXTENSION));

        if (in_array($extension_fichier, $extensions_autorisees)) {
            
            // On crée un nom unique pour éviter les doublons (ex: profil_14_65b3x.jpg)
            $nouveau_nom = 'profil_' . $user_id . '_' . uniqid() . '.' . $extension_fichier;
            $chemin_final = $dossier_destination . $nouveau_nom;

            // On déplace le fichier sur le serveur
            if (move_uploaded_file($chemin_temporaire, $chemin_final)) {
                
                // On met à jour UNIQUEMENT la colonne photo dans la base de données
                $req_photo = $bdd->prepare("UPDATE profils_freelances SET photo = ? WHERE id_utilisateur = ?");
                $req_photo->execute([$nouveau_nom, $user_id]);
                
                $message_succes = "Ton profil et ta photo ont été mis à jour !";
            } else {
                $message_succes = "Profil mis à jour, mais erreur lors de la sauvegarde de l'image.";
            }
        } else {
            $message_succes = "Profil mis à jour, mais format d'image refusé (JPG, PNG ou WEBP uniquement).";
        }
    }
}


$req_profil = $bdd->prepare("SELECT * FROM profils_freelances WHERE id_utilisateur = ?");
$req_profil->execute([$user_id]);
$profil = $req_profil->fetch(PDO::FETCH_ASSOC);

if (!$profil) {
    $profil = [
        'titre_profil' => '', 'description' => '', 'competences' => '', 
        'localisation' => '', 'tarif_horaire' => '', 'disponibilite' => 1, 'exp' => null
    ];
}
?>