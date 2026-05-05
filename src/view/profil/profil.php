<?php include 'src/controller/profil/profil.php'; ?>

<div class="max-w-4xl mx-auto px-6 lg:px-8 mt-24 mb-12">
    
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Mon Profil Technique</h1>
        <a href="index.php?page=dashboard" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
            &larr; Retour au Dashboard
        </a>
    </div>

    <?php if ($message_succes): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <?= ($message_succes) ?>
        </div>
    <?php endif; ?>
    <div class="flex flex-col items-center mb-8">
        <?php if (!empty($profil['photo'])): ?>
            <img src="public/uploads/<?= htmlspecialchars($profil['photo']) ?>" 
                alt="Ma photo de profil" 
                class="h-32 w-32 rounded-full object-cover border-4 border-white shadow-lg mb-3">
            
            <!-- NOUVEAU : La case à cocher pour supprimer -->
            <div class="flex items-center space-x-2">
                <input type="checkbox" id="supprimer_photo" name="supprimer_photo" value="1" class="rounded text-blue-600 focus:ring-blue-500">
                <label for="supprimer_photo" class="text-sm text-red-600 font-medium cursor-pointer hover:text-red-800">
                    Supprimer ma photo actuelle
                </label>
            </div>

        <?php else: ?>
            <div class="h-32 w-32 rounded-full bg-gray-200 border-4 border-white shadow-lg flex items-center justify-center text-4xl text-gray-400">
                👤
            </div>
            <p class="mt-4 text-sm text-gray-500">Aucune photo de profil</p>
        <?php endif; ?>
    </div>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        
        <form action="index.php?page=profil" method="POST" class="space-y-6" enctype="multipart/form-data">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Titre de ton profil (Métier)</label>
                    <input type="text" name="titre_profil" value="<?= ($profil['titre_profil']) ?>" 
                           placeholder="Ex: Développeur Full-Stack PHP"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                </div>
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                    <input type="file" name="image_profil" accept="image/png, image/jpeg, image/webp"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                    <p class="text-xs text-gray-500 mt-2">Formats acceptés : JPG, PNG, WEBP. (Max 2 Mo)</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Localisation (ou Remote)</label>
                    <input type="text" name="localisation" value="<?= ($profil['localisation']) ?>" 
                           placeholder="Ex: Paris, France ou 100% Distanciel"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tarif Horaire (€ / heure)</label>
                    <input type="number" name="tarif_horaire" value="<?= ($profil['tarif_horaire']) ?>" 
                           placeholder="Ex: 50"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Expérience (années)</label>
                <input type="number" name="exp" value="<?= ($profil['exp']) ?>" 
                       placeholder="Ex: 5"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Compétences (Séparées par des virgules)</label>
                <input type="text" name="competences" value="<?= ($profil['competences']) ?>" 
                       placeholder="Ex: HTML, CSS, PHP, Laravel, React"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="5" 
                          placeholder="Présente-toi, parle de tes expériences et de ce que tu recherches..."
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"><?= ($profil['description']) ?></textarea>
            </div>

            <div class="flex items-start bg-gray-50 p-4 rounded-lg border border-gray-200">
                <div class="flex items-center h-5">
                    <input type="checkbox" name="disponibilite" id="disponibilite" value="1" 
                           <?= $profil['disponibilite'] == 1 ? 'checked' : '' ?>
                           class="w-5 h-5 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                </div>
                <div class="ml-3 text-sm">
                    <label for="disponibilite" class="font-bold text-gray-800 cursor-pointer">Je suis disponible</label>
                    <p class="text-gray-500">Décoche cette case si tu es déjà en mission pour ne plus apparaître dans le catalogue public.</p>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-md hover:bg-blue-700 transition shadow-sm">
                    Sauvegarder mon profil
                </button>
            </div>

        </form>

    </div>
</div>