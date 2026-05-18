<?php include 'src/controller/profil/profil_client.php'; ?>

<div class="max-w-4xl mx-auto px-6 lg:px-8 mt-24 mb-12">
    
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Mes Informations</h1>
        <a href="index.php?page=dashboard" class="text-blue-600 hover:text-blue-800 font-medium text-sm">
            &larr; Retour au Dashboard
        </a>
    </div>

    <?php if ($message_succes): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
            <?= ($message_succes) ?>
        </div>
    <?php endif; ?>
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        
        <form action="src/controller/profil/profil_client.php" method="POST" class="space-y-6" enctype="multipart/form-data">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input type="text" name="nom" value="<?= ($profil['nom']) ?>"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                </div>
                <div >
                    <label class="block text-sm font-medium text-gray-700 mb-1">Prenom</label>
                    <input type="text" name="prenom" value="<?= ($profil['prenom']) ?>"
                           class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                <input type="email" name="email" value="<?= ($profil['email']) ?>" 
                       placeholder="Ex: john.doe@example.com"
                       class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom de l'entreprise</label>
                <input type="text" name="entreprise" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
                  
            <div>
                <label class="block text-sm font-medium text-gray-700">Numéro SIRET (14 chiffres)</label>
                <input type="number" name="siret" maxlength="14" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
                  
            <div>
                <label class="block text-sm font-medium text-gray-700">Adresse de l'entreprise</label>
                <input type="text" name="adresse" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="5" 
                          placeholder="Présente-toi, parle de tes expériences et de ce que tu recherches..."
                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"><?= ($profil['description']) ?></textarea>
            </div>

            <div class="pt-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-md hover:bg-blue-700 transition shadow-sm">
                    Sauvegarder mon profil
                </button>
            </div>

        </form>

    </div>
</div>