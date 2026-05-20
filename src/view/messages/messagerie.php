<?php include("src/controller/messages/messagerie.php"); ?>

<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50 min-h-screen">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                Boîte de réception
                <?php if ($nb_non_lus > 0): ?>
                    <span class="inline-flex items-center rounded-full bg-gray-900 px-2.5 py-0.5 text-xs font-semibold text-white"><?= $nb_non_lus ?></span>
                <?php endif; ?>
            </h1>
            <p class="text-sm text-gray-500 mt-1"><?= count($messages) ?> message<?= count($messages) > 1 ? 's' : '' ?> reçu<?= count($messages) > 1 ? 's' : '' ?></p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        <!-- Liste des messages -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                <?php if (empty($messages)): ?>
                    <div class="p-8 text-center">
                        <svg class="mx-auto h-10 w-10 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <p class="text-sm font-medium text-gray-900">Aucun message</p>
                        <p class="text-xs text-gray-500 mt-1">Votre boîte de réception est vide.</p>
                    </div>
                <?php else: ?>
                    <ul class="divide-y divide-gray-100">
                        <?php foreach ($messages as $msg): ?>
                            <?php $actif = isset($_GET['message']) && $_GET['message'] == $msg['id']; ?>
                            <li>
                                <a href="index.php?page=messagerie&lire=<?= $msg['id'] ?>"
                                   class="flex items-start gap-3 px-4 py-4 hover:bg-gray-50 transition-colors <?= $actif ? 'bg-gray-50 border-l-2 border-gray-900' : '' ?>">
                                    <!-- Avatar initiales -->
                                    <div class="flex-shrink-0 h-9 w-9 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600">
                                        <?= strtoupper(substr($msg['prenom'], 0, 1) . substr($msg['nom'], 0, 1)) ?>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between gap-2">
                                            <p class="text-sm <?= $msg['lu'] == 0 ? 'font-bold text-gray-900' : 'font-medium text-gray-700' ?> truncate">
                                                <?= htmlspecialchars($msg['prenom'] . ' ' . $msg['nom']) ?>
                                            </p>
                                            <?php if ($msg['lu'] == 0): ?>
                                                <span class="flex-shrink-0 h-2 w-2 rounded-full bg-gray-900"></span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="text-xs <?= $msg['lu'] == 0 ? 'font-semibold text-gray-800' : 'text-gray-500' ?> truncate mt-0.5">
                                            <?= htmlspecialchars($msg['sujet']) ?>
                                        </p>
                                        <p class="text-xs text-gray-400 mt-0.5">
                                            <?= date('d/m/Y à H:i', strtotime($msg['date_envoi'])) ?>
                                        </p>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <!-- Contenu du message -->
        <div class="lg:col-span-2">
            <?php if ($message_ouvert): ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 md:p-8">
                    <div class="flex items-start justify-between gap-4 mb-6">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900"><?= htmlspecialchars($message_ouvert['sujet']) ?></h2>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="h-7 w-7 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600">
                                    <?= strtoupper(substr($message_ouvert['prenom'], 0, 1) . substr($message_ouvert['nom'], 0, 1)) ?>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">
                                        <?= htmlspecialchars($message_ouvert['prenom'] . ' ' . $message_ouvert['nom']) ?>
                                        <span class="ml-1 inline-flex items-center rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600">
                                            <?= ucfirst($message_ouvert['role']) ?>
                                        </span>
                                    </p>
                                    <p class="text-xs text-gray-400"><?= $message_ouvert['email'] ?></p>
                                </div>
                            </div>
                            <p class="text-xs text-gray-400 mt-2">
                                Reçu le <?= date('d/m/Y à H:i', strtotime($message_ouvert['date_envoi'])) ?>
                            </p>
                        </div>
                        <a href="index.php?page=messagerie&supprimer=<?= $message_ouvert['id'] ?>"
                           onclick="return confirm('Supprimer ce message ?')"
                           class="flex-shrink-0 inline-flex items-center rounded-lg border border-red-200 px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50 transition-colors">
                            <svg class="mr-1.5 h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            Supprimer
                        </a>
                    </div>

                    <div class="border-t border-gray-100 pt-6">
                        <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line"><?= htmlspecialchars($message_ouvert['contenu']) ?></p>
                    </div>

                    <!-- Bouton répondre -->
                    <?php if ($message_ouvert['role'] === 'client' && $_SESSION['user_role'] === 'freelance'): ?>
                        <div class="mt-6 border-t border-gray-100 pt-6">
                            <a href="index.php?page=contacter_freelance&id=<?= $message_ouvert['id_expediteur'] ?>"
                               class="inline-flex items-center rounded-lg bg-gray-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-gray-800 transition-colors">
                                <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                Répondre
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            <?php else: ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <p class="text-sm font-medium text-gray-900 mb-1">Sélectionnez un message</p>
                    <p class="text-xs text-gray-500">Cliquez sur un message dans la liste pour le lire.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</main>
