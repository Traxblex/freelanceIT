<?php
    include ("src/controller/mission/liste_mission.php");
?>

<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 px-6 lg:px-8 mt-24 mb-10 max-w-7xl mx-auto">
    
    <?php foreach ($missions as $mission): ?>
        
    <a href="#" class="block h-full">
        <div class="w-full h-full px-5 py-4 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow flex flex-col justify-between border border-gray-100">
            
            <div>
                <div class="flex items-start justify-between gap-2">
                    <h1 class="text-lg font-semibold text-gray-800 leading-tight">
                        <?= ($mission['titre']) ?>
                    </h1>
                    <span class="px-2 py-1 text-[10px] font-bold text-blue-800 uppercase bg-blue-100 rounded-full shrink-0">
                        <?= ($mission['statut']) ?>
                    </span>
                </div>
                <p class="text-sm text-gray-500 mt-1">
                    <?= ($mission['prenom'] . ' ' . substr($mission['nom'], 0, 1) . '.') ?>
                </p>
                
                <p class="mt-3 text-sm text-gray-600 line-clamp-3">
                    <?= ($mission['description']) ?>
                </p>
            </div>
           <div>
                <span class="text-sm text-gray-500"><?= ($mission['competences_requises']) ?></span>
           </div>

            <div class="mt-5 pt-4 border-t border-gray-100">
                
                <div class="grid grid-cols-2 gap-y-3 gap-x-4 mb-4 text-sm text-gray-600">
                    
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-medium text-gray-800"><?= ($mission['budget']) ?> €</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span><?= ($mission['duree'] ?? 'Non spécifié') ?></span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        <span><?= $mission['nb_candidatures'] ?? 0 ?> propositions</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <span><?= $mission['temps_ecoule'] ?? 'Récemment' ?></span>
                    </div>

                </div>
            </div>

        </div>
    </a>

    <?php endforeach; ?>

</div>