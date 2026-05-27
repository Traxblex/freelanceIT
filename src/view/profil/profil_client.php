<?php include 'src/controller/profil/profil_client.php'; ?>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 mb-16">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Mon profil client</h1>
            <p class="text-sm text-gray-500 mt-1">Informations personnelles et entreprise</p>
        </div>
        <a href="index.php?page=dashboard" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
            <svg class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Retour au dashboard
        </a>
    </div>

    <?php if ($message_succes): ?>
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
            <svg class="h-5 w-5 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-medium"><?= ($message_succes) ?></span>
        </div>
    <?php endif; ?>
    <?php if ($message_erreur): ?>
        <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
            <svg class="h-5 w-5 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-sm font-medium"><?= ($message_erreur) ?></span>
        </div>
    <?php endif; ?>

    <form action="index.php?page=profil_client" method="POST" enctype="multipart/form-data" class="space-y-6">

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide mb-4">Informations personnelles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Prénom <span class="text-red-500">*</span></label>
                    <input type="text" name="prenom" value="<?= ($profil['prenom'] ?? '') ?>"
                           placeholder="Jean"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nom <span class="text-red-500">*</span></label>
                    <input type="text" name="nom" value="<?= ($profil['nom'] ?? '') ?>"
                           placeholder="Dupont"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Adresse e-mail <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="<?= ($profil['email'] ?? '') ?>"
                       placeholder="jean.dupont@exemple.com"
                       class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
            </div>
        </div>

  
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide mb-4">Informations entreprise</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nom de l'entreprise</label>
                    <input type="text" name="entreprise" value="<?= ($profil['nom_entreprise'] ?? '') ?>"
                           placeholder="Ma Super Entreprise SAS"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Numéro SIRET <span class="text-xs text-gray-400 font-normal">(14 chiffres)</span></label>
                    <input type="text" name="siret" value="<?= ($profil['siret'] ?? '') ?>"
                           placeholder="12345678901234" maxlength="14" pattern="[0-9]{14}"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Adresse</label>
                    <input type="text" name="adresse" value="<?= ($profil['adresse'] ?? '') ?>"
                           placeholder="12 rue de la Paix, 75001 Paris"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                    <textarea name="description" rows="4"
                              placeholder="Décrivez votre entreprise, vos besoins en termes de développement..."
                              class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition resize-none"><?= ($profil['description'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="inline-flex items-center rounded-lg bg-gray-900 px-6 py-3 text-sm font-semibold text-white hover:bg-gray-800 transition shadow-sm">
                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Sauvegarder les modifications
            </button>
        </div>

    </form>
</div>
