<title>detailMission</title>
<?php
    include ("src/controller/mission/detailMission.php");
?>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50 min-h-screen">
    <?php foreach ($missions as $mission): ?>
    
    
    <!-- Lien retour -->
    <a href="index.php?page=mission" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-6 transition-colors">
        <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
        Retour aux missions
    </a>

    <!-- En-tête de la mission -->
    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-3xl font-bold text-gray-900"><?= ($mission['titre']) ?></h1>
                <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800"><?= ($mission['statut']) ?></span>
            </div>
            <p class="mt-2 text-sm text-gray-500">
                <span class="font-medium text-gray-900"><?= ($mission['Nom_entreprise']) ?></span> • Il y a 2 jours
            </p>
        </div>
        <div>
            <button class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-colors">
                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                Postuler au projet
            </button>
        </div>
    </div>

    <!-- Grille Principale (2 colonnes) -->
    <div class="mt-8 grid grid-cols-1 gap-8 lg:grid-cols-3">
        
        <!-- COLONNE GAUCHE (Description & Formulaire) -->
        <div class="space-y-8 lg:col-span-2">
            
            <!-- Carte : Description -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8 space-y-8">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Description de la mission</h2>
                        <p class="text-gray-700 leading-relaxed"><?= ($mission['description']) ?></p>
                    </div>
                    
                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Détails supplémentaires</h2>
                        <p class="text-gray-700 leading-relaxed">Ce projet nécessite une expertise approfondie dans les technologies mentionnées. Le candidat idéal devra démontrer une expérience significative dans des projets similaires et être capable de travailler de manière autonome tout en maintenant une communication régulière avec l'équipe.</p>
                    </div>

                    <div>
                        <h2 class="text-lg font-bold text-gray-900 mb-3">Compétences requises</h2>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 text-xs border border-gray-200 rounded-md text-gray-700 bg-gray-50">
                            <?= (trim($t)) ?>
                        </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carte : Formulaire de proposition -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8">
                    <h2 class="text-lg font-bold text-gray-900 mb-6">Soumettre une proposition</h2>
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="proposition" class="block text-sm font-medium text-gray-700">Votre proposition</label>
                            <div class="mt-2">
                                <textarea id="proposition" name="proposition" rows="4" class="block w-full rounded-md border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6 px-3" placeholder="Expliquez pourquoi vous êtes le candidat idéal pour ce projet..."></textarea>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2">
                            <div>
                                <label for="tarif" class="block text-sm font-medium text-gray-700">Tarif proposé (€)</label>
                                <div class="mt-2">
                                    <input type="number" name="tarif" id="tarif" class="block w-full rounded-md border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6 px-3" placeholder="5000">
                                </div>
                            </div>
                            
                            <div>
                                <label for="delai" class="block text-sm font-medium text-gray-700">Délai de livraison</label>
                                <div class="mt-2">
                                    <input type="text" name="delai" id="delai" class="block w-full rounded-md border-0 py-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm sm:leading-6 px-3" placeholder="2 mois">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full flex items-center justify-center rounded-lg bg-gray-900 px-3 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-colors mt-4">
                            <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                            Envoyer la proposition
                        </button>
                    </form>
                </div>
            </div>

        </div>

        <!-- COLONNE DROITE (Sidebar) -->
        <div class="space-y-6 lg:col-span-1">
            
            <!-- Carte : Informations -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6">Informations</h3>
                    <dl class="space-y-5">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Budget</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1"><?= ($mission['budget']) ?> €</dd>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Durée estimée</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1"><?= ($mission['duree'] ?? 'Non spécifié') ?></dd>
                            </div>
                        </div>
                        
                        <!-- Ligne Propositions -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            </div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Propositions</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1"><?= $mission['nb_candidatures'] ?? 0 ?> candidatures</dd>
                            </div>
                        </div>
                        
                        <!-- Ligne Publié -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Publié</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1"><?= $mission['temps_ecoule'] ?? 'Récemment' ?></dd>
                            </div>
                        </div>
                        
                        <!-- Ligne Localisation -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            </div>
                            <div class="ml-3">
                                <dt class="text-sm font-medium text-gray-500">Localisation</dt>
                                <dd class="text-sm font-semibold text-gray-900 mt-1">100% Remote</dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Carte : Entreprise -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">À propos de l'entreprise</h3>
                    
                    <div class="space-y-5">
                        <div>
                            <h4 class="text-base font-semibold text-gray-900"><?= ($mission['Nom_entreprise']) ?></h4>
                            <p class="text-sm text-gray-500 mt-2 leading-relaxed"><?= ($mission['Description_entreprise']) ?></p>
                        </div>
                        
                        <div class="border-t border-gray-100 pt-5">
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Projets publiés</dt>
                                    <dd class="text-sm font-semibold text-gray-900 mt-1"><?= $mission['nb_projets'] ?? 0 ?> projets</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Taux de réussite</dt>
                                    <dd class="text-sm font-semibold text-gray-900 mt-1"><?= $mission['taux_reussite'] ?? '95%' ?></dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php endforeach; ?>
</main>