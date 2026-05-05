<title>Dashboard</title>

<?php include 'src/controller/accueil/dashboard.php'; ?>

<div class="max-w-7xl mx-auto px-6 lg:px-8 mt-24 mb-12">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Mon Tableau de bord</h1>
        <span class="px-4 py-1.5 rounded-full text-sm font-semibold <?= $role === 'client' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' ?>">
            Mode <?= ucfirst($role) ?>
        </span>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            Ravi de vous revoir, <?= ($_SESSION['nom'] ?? 'Utilisateur') ?> !
        </h2>

        <?php if ($role === 'client'): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                    <p class="text-sm font-medium text-gray-500 uppercase">Missions publiées</p>
                    <p class="text-4xl font-bold text-gray-900 mt-2"><?= $stats['nb_missions'] ?? 0 ?></p>
                </div>

                <a href="index.php?page=ajouterMission" class="group p-6 bg-blue-600 rounded-xl hover:bg-blue-700 transition">
                    <h3 class="font-bold text-white text-lg">Publier une mission</h3>
                    <p class="text-blue-100 text-sm mt-1">Trouvez un expert pour votre projet.</p>
                </a>

                <a href="index.php?page=mission" class="p-6 bg-white border border-gray-200 rounded-xl hover:border-blue-300 transition">
                    <h3 class="font-bold text-gray-900 text-lg">Gérer mes offres</h3>
                    <p class="text-gray-500 text-sm mt-1">Voir les candidatures reçues.</p>
                </a>
            </div>

        <?php elseif ($role === 'freelance'): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-gray-50 rounded-xl border border-gray-100">
                    <p class="text-sm font-medium text-gray-500 uppercase">Statut actuel</p>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="w-3 h-3 rounded-full <?= $stats['disponibilite'] ? 'bg-green-500' : 'bg-red-500' ?>"></div>
                        <p class="text-xl font-bold text-gray-900"><?= $stats['disponibilite'] ? 'Disponible' : 'En mission' ?></p>
                    </div>
                    <p class="text-sm text-gray-500 mt-1"><?= ($stats['titre']) ?></p>
                </div>

                <a href="index.php?page=profil" class="p-6 bg-green-600 rounded-xl hover:bg-green-700 transition">
                    <h3 class="font-bold text-white text-lg">Mon Profil Public</h3>
                    <p class="text-green-100 text-sm mt-1">Mettre à jour mes compétences.</p>
                </a>

                <a href="index.php?page=mission" class="p-6 bg-white border border-gray-200 rounded-xl hover:border-green-300 transition">
                    <h3 class="font-bold text-gray-900 text-lg">Trouver une mission</h3>
                    <p class="text-gray-500 text-sm mt-1">Parcourir les opportunités IT.</p>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>