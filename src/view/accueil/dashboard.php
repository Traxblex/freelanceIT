<h1>
    <div class="flex items-center gap-3">
        <span class="text-2xl font-bold text-gray-800">Tableau de bord</span>
        <span class="px-2 py-1 text-sm font-medium text-gray-500 bg-gray-100 rounded-full"><?= count($missions) ?> missions</span>
    </div>
</h1>

<div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($missions as $mission): ?>
        
    <a href="#" class="block h-full">
        <div class="w-full h-full px-5 py-4 bg-white rounded-lg shadow-md  transition-shadow flex flex-col justify-between border border-gray-100">
            
            <div>
                <div class="flex items-start justify-between gap-2">
                    <h1 class="text-lg font-semibold text-gray-800 leading-tight">
                        <?= ($mission['titre']) ?>
                    </h1>
                    <span class="px-2 py-1 text-[10px] font-bold text-blue-800 uppercase bg-blue-100 rounded-full shrink-0">
                        <?= ($mission['statut']) ?>
                    </span>
                </div>
                
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
                </div>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
</div>