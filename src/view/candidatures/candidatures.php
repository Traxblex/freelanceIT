<title>Candidatures</title>
<?php include 'src/controller/candidatures/candidatures.php'; ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50 min-h-screen">
    
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            <?= $user_role === 'freelance' ? 'Mes Candidatures' : 'Candidatures reçues' ?>
        </h1>
        <p class="mt-2 text-sm text-gray-500">
            <?= $user_role === 'freelance' ? 'Suis l\'état de tes propositions envoyées aux clients.' : 'Gère les freelances qui ont postulé à tes missions.' ?>
        </p>
    </div>

    <?php if (empty($candidatures)): ?>
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
            <div class="mx-auto h-24 w-24 text-gray-400 bg-gray-100 rounded-full flex items-center justify-center mb-4 text-4xl">📄</div>
            <h3 class="text-lg font-medium text-gray-900">Aucune candidature</h3>
            <p class="mt-2 text-sm text-gray-500">
                <?= $user_role === 'freelance' ? "Tu n'as pas encore postulé à une mission." : "Personne n'a encore postulé à tes missions." ?>
            </p>
        </div>
    <?php else: ?>
        <div class="space-y-4">
            <?php foreach ($candidatures as $c): ?>
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col md:flex-row md:items-center justify-between gap-6 hover:shadow-md transition-shadow">
                    
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h2 class="text-lg font-bold text-gray-900"><?= htmlspecialchars($c['titre_mission']) ?></h2>
                            
                            <?php 
                                $statut = $c['statut'] ?? 'En attente'; 
                                $couleur_badge = 'bg-yellow-100 text-yellow-800 border-yellow-200'; // Par défaut : En attente
                                if (strtolower($statut) === 'acceptée') $couleur_badge = 'bg-green-100 text-green-800 border-green-200';
                                if (strtolower($statut) === 'refusée') $couleur_badge = 'bg-red-100 text-red-800 border-red-200';
                            ?>
                            <span class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold <?= $couleur_badge ?>">
                                <?= htmlspecialchars($statut) ?>
                            </span>
                        </div>

                        <?php if ($user_role === 'freelance'): ?>
                            <p class="text-sm text-gray-600">Envoyée à <span class="font-medium text-gray-900"><?= htmlspecialchars($c['nom_entreprise']) ?></span></p>
                        <?php else: ?>
                            <p class="text-sm text-gray-600">Postulant : <span class="font-medium text-gray-900"><?= htmlspecialchars($c['prenom'] . ' ' . $c['nom']) ?></span> (<?= htmlspecialchars($c['titre_profil'] ?? 'Freelance') ?>)</p>
                        <?php endif; ?>
                        
                        <div class="mt-4 bg-gray-50 p-4 rounded-md border border-gray-100 text-sm text-gray-700">
                            "<?= nl2br(htmlspecialchars($c['message'] ?? 'Aucun message de présentation.')) ?>"
                        </div>
                    </div>

                    <div class="flex flex-col items-end gap-4 min-w-[200px]">
                        <div class="text-right">
                            <div class="text-sm text-gray-500">Tarif proposé</div>
                            <div class="text-xl font-bold text-gray-900"><?= htmlspecialchars($c['tarif_propose'] ?? '0') ?> €</div>
                            <div class="text-sm text-gray-500 mt-1">Délai : <?= htmlspecialchars($c['delai'] ?? 'Non précisé') ?></div>
                        </div>

                        <?php if ($user_role === 'client' && strtolower($statut) !== 'acceptée' && strtolower($statut) !== 'refusée'): ?>
                            <form action="index.php?page=candidatures" method="POST" class="flex gap-2 w-full mt-2">
                                <input type="hidden" name="id_candidature" value="<?= $c['id'] ?>">
                                <button type="submit" name="action" value="accepter" class="flex-1 bg-green-600 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-green-700 transition">
                                    Accepter
                                </button>
                                <button type="submit" name="action" value="refuser" class="flex-1 bg-white text-gray-700 border border-gray-300 text-sm font-semibold py-2 px-4 rounded-lg hover:bg-gray-50 transition">
                                    Refuser
                                </button>
                            </form>
                        <?php elseif ($user_role === 'client'): ?>
                             <div class="text-sm font-medium text-gray-500">Dossier clôturé</div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
