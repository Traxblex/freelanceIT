<?php include("src/controller/messages/contacter_freelance.php"); ?>

<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50 min-h-screen">

    <a href="javascript:history.back()" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-6 transition-colors">
        <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Retour
    </a>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

        <!-- Carte profil freelance -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-8">
                <div class="flex flex-col items-center text-center">
                    <?php if (!empty($freelance['photo'])): ?>
                        <img src="<?= htmlspecialchars($freelance['photo']) ?>" alt="Photo de <?= htmlspecialchars($freelance['prenom']) ?>" class="h-20 w-20 rounded-full object-cover mb-4">
                    <?php else: ?>
                        <div class="h-20 w-20 rounded-full bg-gray-200 flex items-center justify-center mb-4">
                            <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                    <?php endif; ?>
                    <h2 class="text-lg font-bold text-gray-900"><?= htmlspecialchars($freelance['prenom'] . ' ' . $freelance['nom']) ?></h2>
                    <?php if ($freelance['titre_profil']): ?>
                        <p class="text-sm text-gray-500 mt-1"><?= htmlspecialchars($freelance['titre_profil']) ?></p>
                    <?php endif; ?>
                    <?php if ($freelance['localisation']): ?>
                        <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <?= htmlspecialchars($freelance['localisation']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ($freelance['tarif_horaire']): ?>
                    <div class="mt-5 border-t border-gray-100 pt-5 text-center">
                        <p class="text-xs text-gray-500">Tarif horaire</p>
                        <p class="text-xl font-bold text-gray-900"><?= $freelance['tarif_horaire'] ?> €/h</p>
                    </div>
                <?php endif; ?>

                <?php if ($freelance['competences']): ?>
                    <div class="mt-5 border-t border-gray-100 pt-5">
                        <p class="text-xs font-medium text-gray-500 mb-3">Compétences</p>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach (explode(',', $freelance['competences']) as $comp): ?>
                                <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700"><?= trim(htmlspecialchars($comp)) ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Formulaire de contact -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 md:p-8">
                <h1 class="text-xl font-bold text-gray-900 mb-2">Contacter <?= htmlspecialchars($freelance['prenom']) ?></h1>
                <p class="text-sm text-gray-500 mb-6">Envoyez un message privé directement au freelance.</p>

                <?php if ($message_succes): ?>
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                        <strong>Succès !</strong> <?= htmlspecialchars($message_succes) ?>
                        <div class="mt-3">
                            <a href="index.php?page=freelance" class="text-sm font-semibold underline">Retour à la liste des freelances</a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($message_erreur): ?>
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                        <strong>Erreur !</strong> <?= htmlspecialchars($message_erreur) ?>
                    </div>
                <?php endif; ?>

                <?php if (!$message_succes): ?>
                <form method="POST" action="index.php?page=contacter_freelance&id=<?= $freelance['id'] ?>" class="space-y-6">

                    <div>
                        <label for="sujet" class="block text-sm font-medium text-gray-700 mb-2">Sujet <span class="text-red-500">*</span></label>
                        <input type="text" name="sujet" id="sujet" required
                            value="<?= htmlspecialchars($_POST['sujet'] ?? '') ?>"
                            placeholder="Ex : Proposition pour votre profil..."
                            class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm">
                    </div>

                    <div>
                        <label for="contenu" class="block text-sm font-medium text-gray-700 mb-2">Message <span class="text-red-500">*</span></label>
                        <textarea name="contenu" id="contenu" rows="7" required
                            placeholder="Décrivez votre projet, vos besoins, vos disponibilités..."
                            class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-900 sm:text-sm"><?= htmlspecialchars($_POST['contenu'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="w-full flex items-center justify-center rounded-lg bg-gray-900 px-4 py-3 text-sm font-semibold text-white hover:bg-gray-800 transition-colors">
                        <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Envoyer le message
                    </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>
