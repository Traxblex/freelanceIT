<?php include 'src/controller/profil/profil_client.php'; ?>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-24 mb-16">

    <!-- En-tête -->
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

    <!-- Alertes -->
    <?php if ($message_succes): ?>
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
            <svg class="h-5 w-5 flex-shrink-0 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            <span class="text-sm font-medium"><?= htmlspecialchars($message_succes) ?></span>
        </div>
    <?php endif; ?>
    <?php if ($message_erreur): ?>
        <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-6">
            <svg class="h-5 w-5 flex-shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="text-sm font-medium"><?= htmlspecialchars($message_erreur) ?></span>
        </div>
    <?php endif; ?>

    <form action="index.php?page=profil_client" method="POST" enctype="multipart/form-data" class="space-y-6">

        <!-- Photo de profil -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide mb-4">Photo de profil</h2>
            <div class="flex items-center gap-5">
                <?php
                    $photo = $profil['photo'] ?? null;
                    $src = $photo ? 'public/uploads/' . htmlspecialchars($photo) : null;
                ?>
                <?php if ($src): ?>
                    <img src="<?= $src ?>" alt="Photo de profil" class="h-16 w-16 rounded-full object-cover border border-gray-200">
                <?php else: ?>
                    <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center text-lg font-bold text-gray-500">
                        <?= strtoupper(substr($profil['prenom'] ?? 'U', 0, 1) . substr($profil['nom'] ?? '', 0, 1)) ?>
                    </div>
                <?php endif; ?>
                <div>
                    <label class="cursor-pointer inline-flex items-center rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                        <svg class="mr-2 h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Changer la photo
                        <input type="file" name="photo" accept="image/jpeg,image/png,image/webp" class="hidden">
                    </label>
                    <p class="text-xs text-gray-400 mt-1.5">JPG, PNG ou WEBP — max 5 Mo</p>
                </div>
            </div>
        </div>

        <!-- Informations personnelles -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide mb-4">Informations personnelles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Prénom <span class="text-red-500">*</span></label>
                    <input type="text" name="prenom" value="<?= htmlspecialchars($profil['prenom'] ?? '') ?>"
                           placeholder="Jean"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nom <span class="text-red-500">*</span></label>
                    <input type="text" name="nom" value="<?= htmlspecialchars($profil['nom'] ?? '') ?>"
                           placeholder="Dupont"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Adresse e-mail <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="<?= htmlspecialchars($profil['email'] ?? '') ?>"
                       placeholder="jean.dupont@exemple.com"
                       class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
            </div>
        </div>

        <!-- Informations entreprise -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-sm font-semibold text-gray-900 uppercase tracking-wide mb-4">Informations entreprise</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Nom de l'entreprise</label>
                    <input type="text" name="entreprise" value="<?= htmlspecialchars($profil['nom_entreprise'] ?? '') ?>"
                           placeholder="Ma Super Entreprise SAS"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Numéro SIRET <span class="text-xs text-gray-400 font-normal">(14 chiffres)</span></label>
                    <input type="text" name="siret" value="<?= htmlspecialchars($profil['siret'] ?? '') ?>"
                           placeholder="12345678901234" maxlength="14" inputmode="numeric" pattern="[0-9]{14}"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Adresse</label>
                    <input type="text" name="adresse" value="<?= htmlspecialchars($profil['adresse'] ?? '') ?>"
                           placeholder="12 rue de la Paix, 75001 Paris"
                           class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Description</label>
                    <textarea name="description" rows="4"
                              placeholder="Décrivez votre entreprise, vos besoins en termes de développement..."
                              class="block w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:border-gray-900 focus:ring-1 focus:ring-gray-900 outline-none transition resize-none"><?= htmlspecialchars($profil['description'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Bouton submit -->
        <div class="flex justify-end">
            <button type="submit"
                    class="inline-flex items-center rounded-lg bg-gray-900 px-6 py-3 text-sm font-semibold text-white hover:bg-gray-800 transition shadow-sm">
                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Sauvegarder les modifications
            </button>
        </div>

    </form>
</div>
