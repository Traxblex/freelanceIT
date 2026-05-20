<title>Profil Freelance</title>
<?php
    include ("src/controller/freelance/afficher_profil.php");
?>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50 min-h-screen">
    
    <a href="index.php?page=freelance" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-6 transition-colors">
        <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Retour aux freelances
    </a>

    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-3xl font-bold text-gray-900"><?= ($freelance['titre']) ?></h1>
                <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800"><?= ($freelance['statut']) ?></span>
            </div>
            <p class="mt-2 text-sm text-gray-500">
                <span class="font-medium text-gray-900"><?= ($freelance['nom_entreprise']) ?></span>
            </p>
        </div>
        <div>
            <button class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-colors">
                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                Postuler au projet
            </button>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="space-y-8 lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8 space-y-8">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Description de la mission</h2>
                        <p class="text-gray-700 leading-relaxed"><?= nl2br(($freelance['description'])) ?></p>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Compétences requises</h2>
                        <div class="flex flex-wrap gap-4 mt-4">
                            <?php 
                                $competences = explode(',', $freelance['competences_requises']); 
                                foreach($competences as $competence): ?>
                                <span class="inline-flex items-center rounded-md bg-gray-100 border border-gray-200 px-3 py-1.5 text-sm font-medium text-gray-700"><?= trim($competence) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6 lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Informations</h3>
                    <dl class="space-y-5">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5"><svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Tarif</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1"><?= ($freelance['tarif']) ?> €</dd>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5"><svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Durée estimée</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1"><?= ($freelance['duree'] ?? 'Non spécifié') ?></dd>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5"><svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg></div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Localisation</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1"><?= $freelance['localisation'] ?? 'Non spécifiée' ?></dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</main>
