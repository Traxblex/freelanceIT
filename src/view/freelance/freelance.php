<?php include("src/controller/freelance/freelance.php"); ?>

<div class="max-w-7xl mx-auto px-6 lg:px-8 mt-24 mb-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Découvrez nos experts IT</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <?php foreach ($freelances as $f): ?>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow flex flex-col justify-between">
            
            <div>
                <div class="flex justify-between items-start">
                    <h2 class="text-xl font-bold text-gray-900 leading-tight">
                        <?= ($f['titre_profil'] ?? 'Développeur') ?>
                    </h2>
                    <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                        <?= ($f['est_disponible'] == 1) ? 'Disponible' : 'Occupé' ?>
                    </span>
                </div>
                
                <p class="text-sm text-gray-500 mt-1">
                    <?= ($f['prenom'] . ' ' . substr($f['nom'], 0, 1) . '.') ?>
                </p>

                <p class="text-gray-600 text-sm mt-4 line-clamp-2">
                   <?= ($f['description']) ?>
                </p>

                <div class="flex flex-wrap gap-2 mt-4">
                    <?php 
                    $tags = array_slice($f['tags'], 0, 3);
                    foreach($tags as $t): ?>
                        <span class="px-2 py-1 text-xs border border-gray-200 rounded-md text-gray-700 bg-gray-50">
                            <?= (trim($t)) ?>
                        </span>
                    <?php endforeach; 
                    if(count($f['tags']) > 3): ?>
                        <span class="px-2 py-1 text-xs border border-gray-200 rounded-md text-gray-500">+<?= count($f['tags']) - 3 ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-50 grid grid-cols-2 gap-4">
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span>💰</span> 
                    <span class="font-semibold text-gray-900"><?= $f['tjm'] ?? '450' ?>€ / jour</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span>📍</span> 
                    <span><?= ($f['localisation'] ?? 'Remote') ?></span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span>⏱️</span> 
                    <span>5 ans exp.</span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-600">
                    <span>⭐</span> 
                    <span>4.9 (12 avis)</span>
                </div>
            </div>

            <a href="index.php?page=profil_public&id=<?= $f['id_utilisateur'] ?>" 
               class="mt-6 block text-center py-2 px-4 bg-black text-white rounded-md text-sm font-medium hover:bg-gray-800 transition">
                Voir le profil
            </a>
        </div>
        <?php endforeach; ?>

    </div>
</div>