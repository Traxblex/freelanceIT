<title>Deconnexion</title>
<?php
// SÉCURITÉ : Si aucun utilisateur n'est connecté, on le renvoie à la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=connexion');
    exit();
}

// On récupère le rôle stocké lors de la connexion
$role = $_SESSION['user_role'] ?? 'inconnu';
?>

<div class="max-w-7xl mx-auto px-6 lg:px-8 mt-24 mb-12 ">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Tableau de bord</h1>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">
            Bienvenue sur ton espace, <?= ($_SESSION['user_email'] ?? '') ?> !
        </h2>
        
        <?php if ($role === 'client'): ?>
            
            <p class="text-gray-600 mb-8">Que souhaites-tu faire aujourd'hui pour faire avancer tes projets ?</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="index.php?page=ajouterMission" class="block p-6 bg-blue-50 border border-blue-100 rounded-xl hover:shadow-md hover:bg-blue-100 transition">
                    <div class="text-3xl mb-3">➕</div>
                    <h3 class="font-bold text-blue-900 text-lg">Publier une mission</h3>
                    <p class="text-sm text-blue-700 mt-2">Crée une nouvelle annonce pour trouver le développeur idéal.</p>
                </a>
                
                <a href="#" class="block p-6 bg-white border border-gray-200 rounded-xl hover:shadow-md hover:border-blue-300 transition">
                    <div class="text-3xl mb-3">📋</div>
                    <h3 class="font-bold text-gray-900 text-lg">Mes missions actives</h3>
                    <p class="text-sm text-gray-500 mt-2">Gère tes annonces actuelles et consulte les candidatures reçues.</p>
                </a>
            </div>

        <?php elseif ($role === 'freelance'): ?>

            <p class="text-gray-600 mb-8">Prêt à décrocher ta prochaine mission ? Garde ton profil à jour.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="index.php?page=profil" class="block p-6 bg-green-50 border border-green-100 rounded-xl hover:shadow-md hover:bg-green-100 transition">
                    <div class="text-3xl mb-3">⚙️</div>
                    <h3 class="font-bold text-green-900 text-lg">Mettre à jour mon profil</h3>
                    <p class="text-sm text-green-700 mt-2">Modifie ton TJM, tes technos et indique si tu es disponible.</p>
                </a>
                
                <a href="index.php?page=mission" class="block p-6 bg-white border border-gray-200 rounded-xl hover:shadow-md hover:border-green-300 transition">
                    <div class="text-3xl mb-3">🔍</div>
                    <h3 class="font-bold text-gray-900 text-lg">Explorer les offres</h3>
                    <p class="text-sm text-gray-500 mt-2">Parcours le catalogue des missions et envoie tes propositions.</p>
                </a>
            </div>

        <?php else: ?>
            <p class="text-red-500">Erreur : Rôle utilisateur non reconnu.</p>
        <?php endif; ?>

    </div>
</div>